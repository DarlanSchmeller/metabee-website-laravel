<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $title ?? 'Metabee' }}</title>
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-800 text-gray-900 font-sans">

  <!-- Header -->
  <x-header />
  
  <!-- Main content -->
  <main class="container mx-auto p-6 mt-8 h-max">
    {{ $slot }}
  </main>
  
  <!-- Footer -->
  <x-footer />

</body>

</html>
