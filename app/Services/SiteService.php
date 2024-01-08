<?php

namespace App\Services;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SiteService extends HttpService
{
    public function getAllSites(): array|null
    {
        $apiUrl = config('app.requireDevApi');

        return $this->sendPooledRequest([
            $apiUrl . '/devsites/site-categories',
            $apiUrl . '/devsites/sites'
        ]);
    }

    public function getCategorySites(int $id): array|null
    {
        $apiUrl = config('app.requireDevApi');

        return $this->sendPooledRequest([
            $apiUrl . '/devsites/site-categories',
            $apiUrl . '/devsites/sites/category/' . $id
        ]);
    }
}