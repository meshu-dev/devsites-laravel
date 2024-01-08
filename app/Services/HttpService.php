<?php

namespace App\Services;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

abstract class HttpService
{  
    protected function sendPooledRequest(array $urls)
    {
        $cachedResponses = $this->getCachedData($urls);

        if (!$cachedResponses) {
            $getPools = function (Pool $pool, array $urls) {
                return array_map(fn ($url) => $pool->get($url), $urls);
            };
    
            $responses = Http::pool(fn (Pool $pool) => $getPools($pool, $urls));
            return $this->getPooledData($responses);
        }
        return $cachedResponses;
    }

    protected function getCachedData(array $urls)
    {
        $cachedResponses = [];

        foreach ($urls as $url) {
            $cache = Cache::get($url);

            if ($cache) {
                $cachedResponses[] = $cache;
                continue;
            }
            return null;
        }
        return $cachedResponses;
    }

    protected function getPooledData(array $responses): array
    {
        $dataList = [];

        foreach ($responses as $response) {
            if (!$response->ok()) {
                return null;
            }

            $requestUrl   = $response->handlerStats()['url'];
            $responseData = $response->json()['data'];

            Cache::add($requestUrl, $responseData, 120);

            $dataList[] = $responseData;
        }
        return $dataList;
    }
}