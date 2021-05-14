<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">

        {{-- <link rel="stylesheet" href="{{ mix('sass/app.scss') }}"> --}}

        <style>
            [x-cloak] {display: none;}
        </style>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        @livewireStyles
        @notify_css

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            {{-- l'extension de mon header sans le heading --}}
            {{-- @yield('content') --}}

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            <livewire:flash />

            {{-- <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div> --}}

            @if (session()->has('message'))
                <div class="alert alert-{{ session('notification.type') }} container">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul class="my-0 container">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @include('flashy::message')

        @include('layouts.footer')
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        
        <script src="{{ asset('js/dashboard.js') }}"></script>
        
        @livewireScripts

    <!-- Insertion du fichier js du package yoeunes/notify -->
    @notify_js
    @notify_render

    </body>
</html>
