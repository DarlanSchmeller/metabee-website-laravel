@props([
    "error",
    "description",
])

<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gray-950">
    <x-hexagon-background />
    <x-glowing-circles />

    <div class="relative z-10 max-w-3xl mx-auto px-6 text-center">
        {{ $slot }}

        <h1 class="flex items-center justify-center gap-3 text-5xl md:text-6xl font-extrabold mb-6">
            <span class="text-white px-2">Erro</span>
            <span
                class="bg-gradient-to-r from-amber-400 via-yellow-500 to-amber-600 bg-clip-text text-transparent animate-gradient-x"
            >
                {{ $error }}
            </span>
        </h1>

        <p class="text-gray-300 text-lg mb-10 leading-relaxed max-w-xl mx-auto">
            Ops! {{ $description }}
            <br />
            Que tal voltar para a página inicial?
        </p>

        <a
            href="{{ url("/") }}"
            class="inline-block px-8 py-4 bg-amber-500 text-black font-semibold text-lg rounded-xl shadow-lg hover:bg-amber-600 hover:scale-105 transform transition"
        >
            Voltar para Página Inicial
        </a>
    </div>
</section>
