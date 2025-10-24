<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ $title ?? "MetaBee | Capacitando o Futuro" }}</title>
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>

    <body class="bg-gray-800">
        <!-- Header -->
        @unless (Route::currentRouteName() === "login" || Route::currentRouteName() === "register")
            <x-header />
        @endunless

        {{-- Display Alert messages --}}
        @if (session("success") || session("error"))
            <x-alert />
        @endif

        <!-- Main content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        @unless (Route::currentRouteName() === "login" || Route::currentRouteName() === "register")
            <x-footer />
        @endunless
    </body>
</html>
