<header
    class="bg-gray-900/95 backdrop-blur-sm border-b border-amber-500/20 sticky top-0 z-50"
    x-data="{ open: false }"
>
    <div class="max-w-7xl mx-auto px-4 py-2 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            {{-- Logo --}}
            <a href="{{ route("home") }}" class="flex items-center space-x-2">
                <x-logo />
                <span
                    class="text-2xl font-bold bg-gradient-to-r from-amber-400 to-yellow-500 bg-clip-text text-transparent"
                >
                    MetaBee
                </span>
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex items-center space-x-8">
                @foreach ($menuItems as $item)
                    <a
                        href="{{ $item["href"] }}"
                        class="text-gray-300 hover:text-amber-400 font-medium transition-colors"
                    >
                        {{ $item["label"] }}
                    </a>
                @endforeach
            </nav>

            {{-- Right-side actions --}}
            @auth
                <div class="hidden md:flex items-center space-x-8">
                    <div class="flex items-center gap-2 text-gray-200">
                        {{-- Avatar --}}
                        <div
                            class="w-10 h-10 rounded-full bg-amber-500/20 border border-amber-500/40 flex items-center justify-center overflow-hidden"
                        >
                            @if (! empty(Auth::user()->user_image) && file_exists(storage_path("app/public/user_images/" . Auth::user()->user_image)))
                                <img
                                    src="{{ asset("storage/user_images/" . Auth::user()->user_image) }}"
                                    alt="{{ Auth::user()->name }}"
                                    class="w-full h-full object-cover"
                                />
                            @else
                                <x-heroicon-o-user class="w-6 h-6 text-amber-400" />
                            @endif
                        </div>

                        {{-- First name --}}
                        <span class="font-medium">
                            {{ explode(" ", Auth::user()->name)[0] }}
                        </span>
                    </div>

                    {{-- Logout Button --}}
                    <form method="POST" action="{{ route("logout") }}">
                        @csrf
                        <button
                            class="px-4 py-2 text-amber-400 border border-amber-500/50 rounded-lg hover:bg-amber-500/10 transition-colors"
                        >
                            Sair
                        </button>
                    </form>
                </div>
            @else
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route("login") }}">
                        <button
                            class="px-4 py-2 text-amber-400 border border-amber-500/50 rounded-lg hover:bg-amber-500/10 transition-colors"
                        >
                            Entrar
                        </button>
                    </a>
                    <a href="{{ route("planos") }}">
                        <button
                            class="px-4 py-2 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 rounded-lg hover:shadow-lg hover:shadow-amber-500/50 transition-all font-semibold"
                        >
                            Começar Agora
                        </button>
                    </a>
                </div>
            @endauth

            {{-- Mobile menu toggle --}}
            <div class="md:hidden">
                <button @click="open = !open" class="p-2 text-gray-300 focus:outline-none">
                    {{-- Menu Icon --}}
                    <svg
                        x-show="!open"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    {{-- Close Icon --}}
                    <svg
                        x-show="open"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Navigation --}}
        <div x-show="open" x-transition class="md:hidden py-4 border-t border-amber-500/20">
            <nav class="flex flex-col space-y-4">
                @foreach ($menuItems as $item)
                    <a href="{{ $item["href"] }}" class="text-gray-300 hover:text-amber-400 font-medium">
                        {{ $item["label"] }}
                    </a>
                @endforeach

                {{-- Authenticated user mobile actions --}}
                @auth
                    <div class="pt-4 border-t border-amber-500/20 mt-2 space-y-3">
                        {{-- User Info --}}
                        <div class="flex items-center gap-3 text-gray-200">
                            <div
                                class="w-9 h-9 rounded-full bg-amber-500/20 border border-amber-500/40 flex items-center justify-center"
                            >
                                <x-heroicon-o-user class="w-5 h-5 text-amber-400" />
                            </div>
                            <span class="font-medium text-base">
                                {{ explode(" ", Auth::user()->name)[0] }}
                            </span>
                        </div>

                        {{-- Logout Button --}}
                        <form method="POST" action="{{ route("logout") }}">
                            @csrf
                            <button
                                class="w-full px-4 py-2 text-amber-400 border border-amber-500/50 rounded-lg hover:bg-amber-500/10 transition-colors"
                            >
                                Sair
                            </button>
                        </form>
                    </div>
                @else
                    {{-- Guest mobile actions --}}
                    <div class="pt-4 border-t border-amber-500/20 mt-2">
                        <div class="flex flex-col space-y-2">
                            <a href="{{ route("login") }}">
                                <button
                                    class="w-full px-4 py-2 text-amber-400 border border-amber-500/50 rounded-lg hover:bg-amber-500/10 transition-colors"
                                >
                                    Entrar
                                </button>
                            </a>
                            <a href="{{ route("planos") }}">
                                <button
                                    class="w-full px-4 py-2 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 rounded-lg hover:shadow-lg transition-all font-semibold"
                                >
                                    Começar
                                </button>
                            </a>
                        </div>
                    </div>
                @endauth
            </nav>
        </div>
    </div>
</header>
