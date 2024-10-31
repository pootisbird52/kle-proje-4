<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased overflow-x-hidden">
        
        <div class="min-h-screen flex flex-col bg-gradient-to-tr from-blue-500  to-purple-400 sm:justify-center items-center pt-6 sm:pt-0">

            <div >
                @if (Request::is('login'))
                    <div class="mt-[.5vw] form-text-responsive">
                        <h1>Giriş Yap</h1>                
                    </div>
                @elseif (Request::is('register'))
                <div class="mt-[.5vw] mb-[-.5vw] form-text-responsive">
                    <h1>Kaydol</h1>
                </div>
                @endif                
            </div>

            <div class="min-w-[40vw] sm:max-w-md mt-6 px-6 py-4 mb-6 bg-gradient-to-bl from-blue-600 to-blue-300 shadow-xl shadow-teal-400 overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
