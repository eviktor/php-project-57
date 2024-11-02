<!doctype html>
<html lang="lang="{{ str_replace('_', '-', app()->getLocale()) }}"">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />

    <title>{{ __('Task Manager') }}</title>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header class="w-full">
            <x-navigation />
        </header>

        <section class="{{ $contentClass ?? "main" }}">
            @if (flash()->message)
                <x-flash-message type="{{ flash()->class }}" message="{{ flash()->message }}" />
            @endif
            @hasSection('header'))
                <h1 class="mb-2 text-center">
                    @yield('header')
                </h1>
            @endif
            @yield('content')
        </section>
    </div>
</body>

</html>
