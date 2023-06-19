@props(['pageTitle'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $pageTitle }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&family=Inter:wght@400;500;600;800&display=swap" rel="stylesheet">

        <script src="https://unpkg.com/@phosphor-icons/web"></script>

        @livewireStyles
        @vite('resources/css/app.css')
    </head>
    <body {{ $attributes->class("antialiased bg-zinc-900 text-zinc-400") }}>

        {{ $slot }}

        @livewireScripts
        @vite('resources/js/app.js')
    </body>
</html>
