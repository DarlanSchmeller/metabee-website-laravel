<header class="bg-gray-900/95 backdrop-blur-sm border-b border-amber-500/20 sticky top-0 z-50" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 py-2 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}">
                <div class="flex items-center space-x-2">
                    <x-logo />
                    <span class="text-2xl font-bold bg-gradient-to-r from-amber-400 to-yellow-500 bg-clip-text text-transparent">MetaBee</span>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex items-center space-x-8">
                @foreach ($menuItems as $item)
                    <a href="{{ $item['href'] }}" class="text-gray-300 hover:text-amber-400 font-medium transition-colors">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="hidden md:flex items-center space-x-4">
                <button class="px-4 py-2 text-amber-400 border border-amber-500/50 rounded-lg hover:bg-amber-500/10 transition-colors">Entrar</button>
                <button class="px-4 py-2 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 rounded-lg hover:shadow-lg hover:shadow-amber-500/50 transition-all font-semibold">Começar Agora</button>
            </div>

            {{-- Mobile menu button --}}
            <div class="md:hidden">
                <button @click="open = !open" class="p-2 text-gray-300 focus:outline-none">
                    {{-- Menu Icon --}}
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    {{-- Close Icon --}}
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>

        {{-- Mobile Navigation --}}
        <div x-show="open" x-transition
             class="md:hidden py-4 border-t border-amber-500/20">
            <nav class="flex flex-col space-y-4">
                @foreach ($menuItems as $item)
                    <a href="{{ $item['href'] }}" class="text-gray-300 hover:text-amber-400 font-medium">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <div class="pt-4 space-y-2">
                    <button class="w-full px-4 py-2 text-amber-400 border border-amber-500/50 rounded-lg hover:bg-amber-500/10 transition-colors">Entrar</button>
                    <button class="w-full px-4 py-2 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 rounded-lg hover:shadow-lg transition-all font-semibold">Começar</button>
                </div>
            </nav>
        </div>
    </div>
</header>
