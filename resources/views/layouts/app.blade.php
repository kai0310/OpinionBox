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

        @if (config('opinion-box.chat-bot'))
            <script>
                (function(w, d) { w.CollectId = '{{ config('opinion-box.chat-bot') }}'; const h = d.head || d.getElementsByTagName('head')[0];const s = d.createElement('script'); s.setAttribute('type', 'text/javascript'); s.async=true; s.setAttribute('src', 'https://collectcdn.com/launcher.js');h.appendChild(s); })(window, document);
            </script>
        @endif

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <x-jet-banner/>
            @livewire('navigation-menu')
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 select-none">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            @include('layouts._footer')

        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
