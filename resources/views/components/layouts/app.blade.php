<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="bg-base-200 min-h-screen">
        {{-- Administrator Display --}}
        @auth
        {{-- Nav Left --}}
        <div class="drawer lg:drawer-open">
            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                @livewire('partial.navbar')
                <!-- Page content here -->
                {{$slot}}
                {{-- <label for="my-drawer" class="btn btn-primary drawer-button">Open drawer</label> --}}
            </div> 
            <div class="drawer-side">
                <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                @livewire('partial.sidebar')
            </div>
            </div>
        @endauth
        
        {{-- Guest (Tamu, User Biasa) Display --}}
        @guest
        <div class="flex flex-col justify-center items-center h-screen">
            <h1 class="font-bold text-4xl py-1">{{ config('app.name') }}</h1>
            {{ $slot }}
            </div>
        @endguest
    </body>
</html>
