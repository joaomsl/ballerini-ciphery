<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ballerini Ciphery</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&family=Inter:wght@500;600;800&display=swap" rel="stylesheet">

        @livewireStyles
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <h1>Olá mundo</h1>

        @livewireScripts
        @vite('resources/js/app.js')
    </body>
</html>
