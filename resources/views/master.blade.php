<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Divarpanelim.az')">

    <title>
        @yield('title', 'Divar Panelim')
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    @include('partials.header')

    <main class="mt-16">
        @yield('content')
    </main>

    @include('partials.footer')
</div>

<script>
    window.locale = '{{ app()->getLocale() }}';
</script>
</body>
</html>
