<section class="py-20 relative z-10">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center">Perguntas Frequentes</h2>
        <div class="space-y-6">
            @foreach ($faq as $item)
                <div
                    class="bg-gray-900/50 border border-amber-500/20 rounded-xl p-6 hover:border-amber-500/40 transition-all"
                >
                    <h3 class="text-white font-semibold mb-2">{{ $item["question"] }}</h3>
                    <p class="text-gray-400">{{ $item["answer"] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
