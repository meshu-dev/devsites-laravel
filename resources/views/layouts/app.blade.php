@php
   $normalLinkClass = 'block w-[inherit] text-left p-3 text-slate-700';
   $normalLinkHoverClass = 'hover:data-normal:underline hover:data-normal:underline-offset-8';
   $activeLinkClass = 'data-active:underline data-active:underline-offset-4 data-active:decoration-2 data-active:font-extrabold';
   
   $categoryClass   = "$normalLinkClass $normalLinkHoverClass $activeLinkClass";
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>App Name - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="w-full max-w-7xl m-[auto] px-10">
            <header class="pt-6 pb-6">
                <h1 class="text-slate-900 font-extrabold text-4xl tracking-tight">DevSites</h1>
                <div class="mt-2 text-lg">Technologies and services related to PHP development</div>
            </header>
            <main class="flex flex-row pb-20 w-[960px]">
                @yield('content')
                @section('sidebar')
                    <div class="w-60 pl-10">
                        <h2 class="font-extrabold text-xl pb-3">Categories</h2>
                        <a class="{{ $categoryClass }}" href={{ url('/') }} data-state="{{ $currentCategoryId === 0 ? 'active' : 'normal' }}">All</a>
                        @foreach ($siteCategories as $siteCategory)
                            <a class="{{ $categoryClass }}" href={{ url('/category/' . $siteCategory['id']) }} data-state="{{ $currentCategoryId == $siteCategory['id'] ? 'active' : 'normal' }}">
                                {{ $siteCategory['name'] }}
                            </a>
                        @endforeach
                    </div>
                @show
            </main>
        </div>
    </body>
</html>