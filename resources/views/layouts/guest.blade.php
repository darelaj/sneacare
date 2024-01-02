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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[url('https://cdn.discordapp.com/attachments/698554518278897664/1189237598288367677/bg_dot.jpg')]">

            <div class="flex">

                <div class="w-[1400px] sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>

                <div class="w-full mt-6 px-4 py-4 bg-[#006FEE] dark:bg-[] shadow-md sm:rounded-lg">
                    <div class="col-md-9 col-lg-4 col-xl-5  ">
                        <img src="https://cdn.discordapp.com/attachments/698554518278897664/1189239016256716931/pic1.png"
                        class="my-[50px] mx-auto w-[300px]" alt="Sample image">
                    </div>
                </div>

            </div>

        </div>
    </body>
</html>
