<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{   
    public function showAllSites(Request $request): View
    {
        $response = Http::get('http://api.requiredev.com/api/devsites/site-categories');
        $categories = $response->json()['data'];

        $response = Http::get('http://api.requiredev.com/api/devsites/sites');
        $sites = $response->json()['data'];

        return view(
            'index',
            [
                'categories'  => $categories,
                'sites'       => $sites
            ]
        );
    }
    
    public function showCategorySites(Request $request, int $categoryId): View
    {
        $response = Http::get('http://api.requiredev.com/api/devsites/site-categories');
        $categories = $response->json()['data'];

        $response = Http::get('http://api.requiredev.com/api/devsites/sites/category/' . $categoryId);
        $sites = $response->json()['data'];

        return view(
            'index',
            [
                'categories' => $categories,
                'sites'      => $sites
            ]
        );
    }
}
