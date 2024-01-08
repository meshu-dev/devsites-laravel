<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\SiteService;

class SiteController extends Controller
{
    public function __construct(
        protected SiteService $siteService
    ) { }
    
    public function showAllSites(Request $request): View
    {
        [$siteCategories, $sites] = $this->siteService->getAllSites();

        return view(
            'index',
            [
                'siteCategories'  => $siteCategories,
                'sites'           => $sites,
                'currentCategoryId' => 0
            ]
        );
    }
    
    public function showCategorySites(Request $request, int $categoryId): View
    {
        [$siteCategories, $sites] = $this->siteService->getCategorySites($categoryId);

        return view(
            'index',
            [
                'siteCategories'    => $siteCategories,
                'sites'             => $sites,
                'currentCategoryId' => $categoryId
            ]
        );
    }
}