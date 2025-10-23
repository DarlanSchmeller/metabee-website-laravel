<x-layout>
    <div x-data="{ step: 1 }" class="min-h-screen bg-gray-950 relative pt-24 pb-16 overflow-hidden">
        <x-hexagon-background />
        <x-glowing-circles />

        <div class="relative max-w-5xl mx-auto px-6 lg:px-8 pb-6">
            <div class="flex flex-col items-center mb-10">
                <h1 class="text-4xl md:text-5xl font-bold text-white text-center mb-3">Editar Curso</h1>
            </div>

            <x-progress-bar />
            <x-create-form />
        </div>
    </div>
</x-layout>
