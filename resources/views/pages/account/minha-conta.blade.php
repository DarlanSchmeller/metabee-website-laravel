<x-layout>
    <div class="min-h-screen bg-gray-950 relative">
        <x-hexagon-background />
        <x-glowing-circles />

        <div class="relative mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
            <a
                href="{{ route("cursos.index") }}"
                class="inline-flex items-center space-x-2 bg-gray-800/60 hover:bg-gray-700/80 text-amber-400 hover:text-amber-300 font-semibold px-5 py-3 rounded-lg shadow-md hover:shadow-amber-500/40 transition-all duration-200 border border-amber-500/30 mb-6"
            >
                <x-heroicon-o-arrow-left class="w-5 h-5" />
                <span>Voltar para a Home</span>
            </a>

            <div class="grid gap-6 lg:grid-cols-3">
                <!-- Left Column -->
                <div class="space-y-6">
                    <x-profile-card :user="$user" />
                    <x-profile-stats :user="$user" />

                    <form
                        method="POST"
                        action="{{ route("account.destroy") }}"
                        onsubmit="confirm('Você tem certeza que deseja deletar sua conta? Este processo é irreversível e todas suas informações serão apagadas permanentemente.')"
                    >
                        @csrf
                        @method("DELETE")
                        <button
                            type="submit"
                            href="{{ route("cursos.index") }}"
                            class="inline-flex items-center space-x-2 bg-gray-800/60 hover:bg-gray-700/80 text-red-400 hover:text-red-300 font-semibold px-5 py-3 rounded-lg shadow-md hover:shadow-red-500/40 transition-all duration-200 border border-red-500/30 mb-6"
                        >
                            <x-heroicon-s-backspace class="w-5 h-5" />
                            <span>Deletar Conta</span>
                        </button>
                    </form>
                </div>

                <!-- Right Column -->
                <div class="lg:col-span-2 space-y-6">
                    <x-personal-info-form :user="$user" />
                    <x-update-password-form :user="$user" />
                </div>
            </div>
        </div>
    </div>
</x-layout>
