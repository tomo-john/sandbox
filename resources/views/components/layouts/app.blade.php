<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>

    <body class="min-h-screen bg-linear-to-br from-zinc-50 to-zinc-100 font-sans antialiased p-6">
        {{ $slot }}
    </body>
</html>
