@extends('layouts.app')
 
@section('title', 'Page Title')
 
@section('sidebar')
 
@section('content')
    <div class="sites">
        @foreach ($sites as $site)
            <a class="site" href="{{ $site['url'] }}" target=”_blank” class="">
                <img class="" src={{ $site['image_url'] }} alt="" />
                <div class="site-name">{{ $site['name'] }}</div>
            </a>
        @endforeach
    </div>
@endsection