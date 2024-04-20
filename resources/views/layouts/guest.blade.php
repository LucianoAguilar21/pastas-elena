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
    </head>
    <body class="font-sans text-gray-900 antialiased ">
        <div class=" min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                    <img class="rounded-full w-20 shadow-lg" src="https://scontent.fsty1-1.fna.fbcdn.net/v/t1.6435-9/209762159_341557424073447_222755981763541434_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=5f2048&_nc_ohc=eY4q_Hht1pMAb6W3XEW&_nc_ht=scontent.fsty1-1.fna&oh=00_AfCrqaM7PmEf6HCrHDaSV2ETNZcVb8BMEt95kPi5h8SQLw&oe=6648FCE9" alt="logo">
                </a>
            </div>

            <div class=" w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
