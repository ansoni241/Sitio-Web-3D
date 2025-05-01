<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content=" {{$metaDescription ?? 'Default meta description'}}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title> {{$title ?? ''}} | Industrias Patzi </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Incluye SweetAlert y jQuery (si aún no están incluidos) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.all.min.js"></script>
        {{-- GLOBO TERRAQUEO --}}
        <link rel="stylesheet" href="https://www.openglobus.org/og.css" type="text/css">
        <script src="https://www.openglobus.org/og.js"></script>
        <style type="text/css">
            #mapContainer{top: 0; right: 0; bottom: 0; left: 0; position: absolute !important;}
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/app.scss'])
    </head>
    <body class="font-sans antialiased" style="background-color: #3490dc;">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
