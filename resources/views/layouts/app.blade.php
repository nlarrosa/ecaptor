<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Ecaptor') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <x-laravel-blade-sortable::scripts/>
        <script src="{{ asset('js/app.js') }}" defer></script>

        

        @livewireStyles

    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            @include('layouts.sidebar')
            
            <div class="flex-1 flex flex-col overflow-hidden">
                @include('layouts.header')

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 relative">
                    <div class="container mx-auto px-6 py-8">
                        {{-- @livewire('ui.toast') --}}
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
        <script src="{{ asset('js/ecaptor.js') }}" defer></script>

        <script>
           

            window.addEventListener('ModalAlertTimer', event => {
                const icon  = event.detail.icon;
                const title = event.detail.title;
                AlertTimer(icon, title);
            });


            window.addEventListener('ModalAlertTimerRedirect', event => {
                const text  = event.detail.text;
                const title = event.detail.title;
                const url   = event.detail.url;
                AlertTimerRedirect(text, title, url);
            });


            window.addEventListener('ModalAlertConfirmCancel', event => {
                const saleId  = event.detail.saleId;
                AlertConfirmCancelSale(saleId);
            });


            window.addEventListener('ModalAlertTimerSketch', event => {
                const icon  = event.detail.icon;
                const title = event.detail.title;
                AlertTimerSketchConfirm(icon, title);
            });


        </script>
    </body>
</html>
