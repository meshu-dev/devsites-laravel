<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    public function showAllSites(): View
    {
        // Get DevPush API Url from config/app.php file
        $apiUrl = config('app.devpush_api_url');

        // Send a request to DevPush API to get dev site categories
        $response = Http::get($apiUrl . '/devsites/categories');

        // Convert the site category JSON data to a PHP array
        $categories = $response->json()['data'];

        // Send a request to DevPush API to get dev sites
        $response = Http::get($apiUrl . '/devsites');
        
        // Convert the site JSON data to a PHP array
        $sites = $response->json()['data'];

        // Gets and processes index.blade.php in resources/views folder
        return view(
            'index',
            [
                'categories'  => $categories,
                'sites'       => $sites
            ]
        );
    }
    
    public function showCategorySites(int $categoryId): View
    {
        // Get DevPush API Url from config/app.php file
        $apiUrl = config('app.devpush_api_url');

        // Send a request to DevPush API to get dev site categories
        $response = Http::get($apiUrl . '/devsites/categories');
        
        // Convert the site category JSON data to a PHP array
        $categories = $response->json()['data'];

        // Send a request to DevPush API to get dev sites
        $response = Http::get($apiUrl . '/devsites/categorized/' . $categoryId);
        
        // Convert the site category JSON data to a PHP array
        $sites = $response->json()['data'];


        // Gets and processes index.blade.php in resources/views folder
        return view(
            'index',
            [
                'categories' => $categories,
                'sites'      => $sites
            ]
        );
    }
}