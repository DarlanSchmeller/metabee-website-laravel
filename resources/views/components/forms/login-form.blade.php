<form method="POST" action="{{ route("login") }}" class="space-y-5 md:space-y-6">
    @csrf

    @if (session("error"))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session("error") }}
        </div>
    @endif

    {{-- Email --}}
    <div class="space-y-2">
        <label for="email" class="text-gray-200 text-sm md:text-base">E-mail</label>
        <div class="relative">
            <x-heroicon-o-envelope class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" />
            <input
                id="email"
                type="email"
                name="email"
                required
                autofocus
                placeholder="seu@email.com"
                value="{{ old("email") }}"
                class="pl-10 bg-zinc-800/50 border outline-none border-zinc-700 text-white placeholder:text-gray-300 focus:border-amber-500 focus:ring-amber-500/20 focus:ring-1 rounded-lg w-full py-3 text-base md:text-lg transition"
            />
        </div>
    </div>

    {{-- Password --}}
    <div x-data="{ show: false }" class="space-y-2">
        <div class="flex items-center justify-between">
            <label for="password" class="text-gray-200 text-sm md:text-base">Senha</label>
            <a href="#" class="text-xs md:text-sm text-amber-400 hover:text-amber-300 transition-colors">
                Esqueceu a senha?
            </a>
        </div>

        <div class="relative">
            {{-- Lock icon --}}
            <x-heroicon-o-lock-closed class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" />

            <input
                :type="show ? 'text' : 'password'"
                id="password"
                name="password"
                required
                placeholder="••••••••"
                class="pl-10 pr-10 bg-zinc-800/50 border outline-none border-zinc-700 text-white placeholder:text-gray-300 focus:border-amber-500 focus:ring-amber-500/20 focus:ring-1 rounded-lg w-full py-3 text-base md:text-lg transition"
            />

            {{-- Toggle button --}}
            <button
                type="button"
                @click="show = !show"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-200 transition"
            >
                <template x-if="!show">
                    <x-heroicon-o-eye class="w-5 h-5" />
                </template>
                <template x-if="show">
                    <x-heroicon-o-eye-slash class="w-5 h-5" />
                </template>
            </button>
        </div>
    </div>

    <x-button
        type="submit"
        px="w-full"
        py="py-3"
        hover="hover:from-amber-600 hover:to-yellow-600 hover:shadow-md hover:shadow-amber-500/20"
        scale=""
    >
        Entrar
    </x-button>
    <div class="mt-4 text-center text-sm text-gray-300">
        Ainda não tem uma conta?
        <a href="{{ route("register") }}" class="text-amber-400 hover:text-amber-300 font-medium">Crie agora</a>
    </div>
</form>
