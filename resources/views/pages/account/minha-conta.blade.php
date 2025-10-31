<x-layout>
    <div class="min-h-screen bg-gray-950 relative">
        <x-hexagon-background />
        <x-glowing-circles />

        <div class="relative mx-auto max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between gap-6">
                <a
                    href="{{ route("cursos.index") }}"
                    class="inline-flex items-center space-x-2 bg-gray-800/60 hover:bg-gray-700/80 text-amber-400 hover:text-amber-300 font-semibold px-5 py-3 rounded-lg shadow-md hover:shadow-amber-500/40 transition-all duration-200 border border-amber-500/30 mb-6"
                >
                    <x-heroicon-o-arrow-left class="w-5 h-5" />
                    <span>Voltar para a Home</span>
                </a>

                @if ($user->role === "instructor")
                    <a
                        href="{{ route("message.index") }}"
                        class="inline-flex items-center space-x-2 bg-cyan-800/60 hover:bg-cyan-700/80 text-white hover:text-gray-200 font-semibold px-5 py-3 rounded-lg shadow-md hover:shadow-gray-600 transition-all duration-200 border border-amber-500/30 mb-6"
                    >
                        <x-heroicon-o-envelope-open class="w-5 h-5" />
                        <span>Visualizar Mensagens de Contato</span>
                    </a>
                @endif
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                <!-- Left Column -->
                <div class="space-y-6">
                    <x-profile-card :user="$user" />
                    <x-profile-stats :user="$user" />
                </div>

                <!-- Right Column -->
                <div class="lg:col-span-2 space-y-6">
                    <x-personal-info-form :user="$user" />
                    <x-update-password-form :user="$user" />
                    <x-delete-account-form />
                </div>
            </div>
        </div>
    </div>
</x-layout>
