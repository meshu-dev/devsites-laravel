<!DOCTYPE html>
<html lang="en">
    <head>
        <title>App Name - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>DevSites</h1>
            <div>Technologies and services related to PHP development</div>
        </header>
        <main>
            @yield('content')
            @section('sidebar')
                <div class="categories">
                    <h2>Categories</h2>
                    <a class="category" href={{ url('/') }}>All</a>
                    @foreach ($categories as $category)
                        <a class="category" href={{ url('/category/' . $category['id']) }}>
                            {{ $category['name'] }}
                        </a>
                    @endforeach
                </div>
            @show
        </main>
    </body>
</html>