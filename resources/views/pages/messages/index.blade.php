<x-layout>
    <div class="min-h-screen bg-gray-950 relative">
        <x-hexagon-background />
        <x-glowing-circles />

        <div class="relative mx-auto max-w-5xl px-4 py-24 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-6 mb-10">
                <a
                    href="{{ route("account.index") }}"
                    class="inline-flex items-center space-x-2 bg-gray-800/60 hover:bg-gray-700/80 text-amber-400 hover:text-amber-300 font-semibold px-5 py-3 rounded-lg shadow-md hover:shadow-amber-500/40 transition-all duration-200 border border-amber-500/30"
                >
                    <x-heroicon-o-arrow-left class="w-5 h-5" />
                    <span>Voltar para Minha Conta</span>
                </a>

                <h2 class="text-3xl font-bold text-white text-center sm:text-left flex-shrink">Mensagens de Contato</h2>
            </div>

            {{-- Messages List --}}
            <div class="space-y-12">
                @forelse ($messages as $message)
                    <x-message-card :message="$message" />
                @empty
                    <p class="text-gray-400 text-center">Nenhuma mensagem encontrada.</p>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-10">
                {{ $messages->links("vendor.pagination.tailwind") }}
            </div>
        </div>
    </div>
</x-layout>
