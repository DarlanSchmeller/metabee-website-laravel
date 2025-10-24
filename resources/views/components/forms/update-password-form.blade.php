@props(["user" => null])

<form
    action="{{ route("home", $user->id) }}"
    method="POST"
    class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-6 space-y-4"
    x-data="{ showPassword: false }"
>
    @csrf
    @method("PUT")
    <h3 class="text-xl font-semibold text-white flex items-center gap-2">
        <x-heroicon-o-lock-closed class="w-5 h-5 text-amber-500" />
        Segurança
    </h3>

    {{-- Current Password --}}
    <div class="space-y-2">
        <label for="new-password" class="text-gray-200 text-sm md:text-base">Senha Atual</label>
        <div class="relative">
            <x-heroicon-o-lock-closed class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" />
            <input
                :type="showPassword ? 'text' : 'password'"
                id="new-password"
                name="new-password"
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
    <div class="grid gap-4 sm:grid-cols-2">
        {{-- New Password --}}
        <div class="space-y-2">
            <label for="new-password" class="text-gray-200 text-sm md:text-base">Nova Senha</label>
            <div class="relative">
                <x-heroicon-o-lock-closed class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" />
                <input
                    :type="showPassword ? 'text' : 'password'"
                    id="new-password"
                    name="new-password"
                    required
                    placeholder="••••••••"
                    class="pl-10 pr-10 bg-zinc-800/50 border outline-none border-zinc-700 text-white placeholder:text-gray-300 focus:border-amber-500 focus:ring-amber-500/20 focus:ring-1 rounded-lg w-full py-3 text-base md:text-lg transition"
                />
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
    </div>

    <button
        type="submit"
        class="bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-4 py-2 rounded-lg hover:shadow-lg hover:shadow-amber-500/50 flex items-center gap-2"
    >
        <x-heroicon-o-document-arrow-down class="w-4 h-4" />
        Salvar Senha
    </button>
</form>
