<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'Laravel' }}</title>

        @vite('resources/css/app.css')

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="antialiased">
        {{ $slot }}
    </body>

    @vite('resources/js/app.js')
</html>