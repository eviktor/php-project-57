<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __('Task Manager') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="font-sans antialiased text-gray-900">
            <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
                <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
                    @if (count($errors) > 0)
                        <div class="font-medium text-red-600">
                            {{ __('Something went wrong:') }}
                        </div>
                    @endif
                    <h2 class="text-center"><a href="/">{{ __('Task Manager') }}</a></h2>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
