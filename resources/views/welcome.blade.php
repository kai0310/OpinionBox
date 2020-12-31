<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OpinionBox</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        body {font-family: 'Nunito';}@keyframes fadeIn{ 0% {opacity: 0} 100% {opacity: 1} } .fade { animation: fadeIn .5s ease 0s 1 normal; }

    </style>
</head>
<body>
<div class="min-h-screen min-w-full bg-gray-100 flex flex-col justify-center p-10">
    <div class="relative w-full max-w-full lg:max-w-6xl xl:max-w-screen-2xl mx-auto fade">
        <div class="absolute inset-0 -mr-3.5 bg-gradient-to-r from-red-100 to-purple-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:rotate-3 sm:rounded-3xl"></div>
        <div class="relative bg-white shadow-lg sm:rounded-3xl">
            <div class="flex items-center justify-start pt-6 pl-6">
                <span class="w-3 h-3 bg-red-400 rounded-full mr-2"></span>
                <span class="w-3 h-3 bg-yellow-400 rounded-full mr-2"></span>
                <span class="w-3 h-3 bg-green-400 rounded-full mr-2"></span>
            </div>

            <div class="px-20 py-6">
                <div class="sm:flex items-center justify-between">
                    <div class="hidden md:flex"><x-jet-application-logo /></div>
                    <div class="md:hidden"><x-jet-application-mark /></div>
                    <div class="sm:flex items-center justify-center">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="mr-5 text-lg font-medium text-true-gray-800 hover:text-cool-gray-700 transition duration-150 ease-in-out">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="mr-5 text-lg font-medium text-true-gray-800 hover:text-cool-gray-700 transition duration-150 ease-in-out">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-6 py-3 text-lg rounded-3xl font-medium bg-gradient-to-b md:from-gray-900 to-black md:text-white outline-none focus:outline-none hover:shadow-md hover:from-true-gray-900 transition duration-200 ease-in-out">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>

                <div class="lg:2/6 xl:w-2/4 my-20 lg:my-40 lg:ml-16 text-left">
                    <div class="text-3xl md:text-5xl text-gray-900 leading-none">From Your Opinion<br />to Big Impact</div>
                    <div class="my-6 text-xl md:text-xl font-light text-true-gray-400 antialiased">OpinionBoxを用いて私たちで学校に改革を起こしませか？</div>
                    <a href="{{ route('login') }}" class="mt-6 md:px-8 md:py-4 rounded-full font-normal tracking-wide md:bg-gradient-to-b from-blue-600 to-blue-700 text-blue-700 md:text-white outline-none focus:outline-none hover:underline md:hover:shadow-lg hover:from-blue-700 transition duration-200 ease-in-out">
                        Let's use OpinionBox
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
