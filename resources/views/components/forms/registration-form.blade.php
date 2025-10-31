<form
    method="POST"
    action="{{ route("register") }}"
    class="space-y-5 md:space-y-6"
    x-data="{ showPassword: false }"
>
    @csrf

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Full name --}}
    <div class="space-y-2">
        <label for="name" class="text-gray-200 text-sm md:text-base">Nome Completo</label>
        <div class="relative">
            <x-heroicon-o-user class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" />
            <input
                id="name"
                type="text"
                name="name"
                required
                autofocus
                placeholder="Seu nome completo"
                value="{{ old("name") }}"
                class="pl-10 bg-zinc-800/50 border outline-none border-zinc-700 text-white placeholder:text-gray-300 focus:border-amber-500 focus:ring-amber-500/20 focus:ring-1 rounded-lg w-full py-3 text-base md:text- transition"
            />
        </div>
    </div>

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
                placeholder="seu@email.com"
                value="{{ old("email") }}"
                class="pl-10 bg-zinc-800/50 border outline-none border-zinc-700 text-white placeholder:text-gray-300 focus:border-amber-500 focus:ring-amber-500/20 focus:ring-1 rounded-lg w-full py-3 text-base md:text-lg transition"
            />
        </div>
    </div>

    {{-- Password --}}
    <div class="space-y-2">
        <label for="password" class="text-gray-200 text-sm md:text-base">Senha</label>
        <div class="relative">
            <x-heroicon-o-lock-closed class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" />
            <input
                :type="showPassword ? 'text' : 'password'"
                id="password"
                name="password"
                required
                placeholder="••••••••"
                class="pl-10 pr-10 bg-zinc-800/50 border outline-none border-zinc-700 text-white placeholder:text-gray-300 focus:border-amber-500 focus:ring-amber-500/20 focus:ring-1 rounded-lg w-full py-3 text-base md:text-lg transition"
            />

            <button
                type="button"
                @click="showPassword = !showPassword"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-200 transition"
                aria-label="Mostrar ou ocultar senha"
            >
                <template x-if="!showPassword">
                    <x-heroicon-o-eye class="w-5 h-5" />
                </template>
                <template x-if="showPassword">
                    <x-heroicon-o-eye-slash class="w-5 h-5" />
                </template>
            </button>
        </div>
    </div>

    {{-- Confirm password --}}
    <div class="space-y-2">
        <label for="password_confirmation" class="text-gray-200 text-sm md:text-base">Confirmar Senha</label>
        <div class="relative">
            <x-heroicon-o-lock-closed class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" />
            <input
                :type="showPassword ? 'text' : 'password'"
                id="password_confirmation"
                name="password_confirmation"
                required
                placeholder="Confirme sua senha"
                class="pl-10 pr-10 bg-zinc-800/50 border outline-none border-zinc-700 text-white placeholder:text-gray-300 focus:border-amber-500 focus:ring-amber-500/20 focus:ring-1 rounded-lg w-full py-3 text-base md:text-lg transition"
            />
        </div>
    </div>

    <x-button
        type="submit"
        px="w-full"
        py="py-3"
        hover="hover:from-amber-600 hover:to-yellow-600 hover:shadow-md hover:shadow-amber-500/20"
        scale=""
    >
        Criar Conta
    </x-button>

    <div class="mt-4 text-center text-sm text-gray-300">
        Já tem uma conta?
        <a href="{{ route("login") }}" class="text-amber-400 hover:text-amber-300 font-medium">Entrar agora</a>
    </div>
</form>
