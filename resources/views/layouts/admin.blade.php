<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OpinionBox') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('css/global.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ url('js/app.js') }}" defer></script>

</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 flex">

    <!-- Side Navigation -->
    <x-admin.side-navigation/>

    <div class="flex flex-col flex-1 w-full">
        <!-- Page Heading -->
        <header class="bg-white shadow sticky top-0">
            <div class="flex justify-between h-16">
                <div class="mx-auto w-full py-6 px-4 sm:px-6 lg:px-8 select-none">
                    {{ $header }}
                </div>

                <!-- Hamburger -->
                <x-admin.hamburger-menu />
            </div>
        </header>

        <!-- Page Content -->
        <main class="m-5">
            {{ $slot }}
        </main>
    </div>

</div>

@stack('modals')
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10" defer></script>
<x-livewire-alert::scripts/>
</body>
</html>
