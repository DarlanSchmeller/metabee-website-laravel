<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $title ?? 'Metabee' }}</title>
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900 font-sans">

  <!-- Header -->
  <header class="bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between p-4">
      <a href="/" class="text-2xl font-bold text-gray-800">Metabee</a>
      <nav class="space-x-6 text-gray-700">
        <a href="#" class="hover:text-yellow-500 transition-colors">Home</a>
        <a href="#" class="hover:text-yellow-500 transition-colors">About</a>
        <a href="#" class="hover:text-yellow-500 transition-colors">Services</a>
        <a href="#" class="hover:text-yellow-500 transition-colors">Contact</a>
      </nav>
    </div>
  </header>

  <!-- Main content -->
  <main class="container mx-auto p-6 mt-8 h-max">
    {{ $slot }}
  </main>

  <!-- Footer -->
  <footer class="bg-gray-200 mt-12">
    <div class="container mx-auto py-6 flex flex-col md:flex-row justify-between items-center text-gray-700 text-sm">
      <p>© 2025 Metabee. All rights reserved.</p>
      <div class="space-x-4 mt-4 md:mt-0">
        <a href="#" class="hover:text-orange-500 transition-colors">Privacy Policy</a>
        <a href="#" class="hover:text-orange-500 transition-colors">Terms of Service</a>
        <a href="#" class="hover:text-orange-500 transition-colors">Support</a>
      </div>
    </div>
  </footer>

</body>

</html>
