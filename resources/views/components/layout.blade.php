<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'Metabee | Capacitando o Futuro' }}</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-800">
    <!-- Header -->
    @unless(Route::currentRouteName() === 'login')
        <x-header />
    @endunless

    <!-- Main content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    @unless(Route::currentRouteName() === 'login')
        <x-footer />
    @endunless
</body>

</html>
