<form method="POST" action="{{ route("login") }}" class="space-y-5 md:space-y-6">
    @csrf
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
    <div class="space-y-2">
        <div class="flex items-center justify-between">
            <label for="password" class="text-gray-200 text-sm md:text-base">Senha</label>
            <a href="#" class="text-xs md:text-sm text-amber-400 hover:text-amber-300 transition-colors">
                Esqueceu a senha?
            </a>
        </div>
        <div class="relative">
            <x-heroicon-o-lock-closed class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" />
            <input
                id="password"
                type="password"
                name="password"
                required
                placeholder="••••••••"
                class="pl-10 pr-10 bg-zinc-800/50 border outline-none border-zinc-700 text-white placeholder:text-gray-300 focus:border-amber-500 focus:ring-amber-500/20 focus:ring-1 rounded-lg w-full py-3 text-base md:text-lg transition"
            />
        </div>
    </div>

    <button
        type="submit"
        class="w-full bg-gradient-to-r from-amber-500 to-yellow-500 text-zinc-900 font-semibold hover:from-amber-600 hover:to-yellow-600 hover:shadow-md hover:shadow-amber-500/20 transition-all duration-300 py-3 rounded-lg text-base md:text-lg"
    >
        Entrar
    </button>

    <div class="mt-4 text-center text-sm text-gray-300">
        Ainda não tem uma conta?
        <a href="{{ route("register") }}" class="text-amber-400 hover:text-amber-300 font-medium">Crie agora</a>
    </div>
</form>
