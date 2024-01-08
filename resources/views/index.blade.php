@extends('layouts.app')
 
@section('title', 'Page Title')
 
@section('sidebar')
 
@section('content')
    <div class="flex flex-wrap gap-10 justify-between after:content-[''] after:flex-auto">
        @foreach ($sites as $site)
            <a href="{{ $site['url'] }}" target=”_blank” class="flex inline-block w-72 h-60 flex-col bg-slate-50 rounded-lg p-6 border border-gray-300 shadow-lg">
                <figure>
                    <img class="rounded-md" src={{ $site['image_url'] }} alt="" width="384" height="512" />
                    <div class="text-slate-900 font-semibold mt-4">{{ $site['name'] }}</div>
                </figure>
            </a>
        @endforeach
    </div>
@endsection
