<section class="py-20 relative z-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-8">Todos os planos incluem</h2>
        <div class="grid md:grid-cols-2 gap-6">
            @foreach ($features as $feature)
                <div class="flex items-center space-x-3 bg-gray-900/50 border border-amber-500/20 rounded-xl p-4">
                    <x-heroicon-o-check class="w-6 h-6 text-amber-400" />
                    <span class="text-gray-300">{{ $feature }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
