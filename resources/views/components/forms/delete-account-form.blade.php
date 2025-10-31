<div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-6 space-y-6">
    {{-- Danger Zone Header --}}
    <div class="border-b border-red-600 pb-2 mb-4">
        <h2 class="text-red-500 font-bold uppercase tracking-widest text-sm flex items-center gap-2">
            <x-heroicon-s-exclamation-triangle class="w-5 h-5" />
            Danger Zone
        </h2>
    </div>

    <p class="text-gray-300 text-sm leading-relaxed">
        <span class="text-red-400 font-semibold">Atenção:</span>
        ao deletar sua conta,
        <span class="text-red-300 font-medium">
            todos os seus dados, cursos, progresso e informações pessoais serão permanentemente excluídos
        </span>
        e não poderão ser recuperados. Essa ação é
        <span class="uppercase font-bold text-red-500">irreversível</span>
        .
    </p>

    <form
        method="POST"
        action="{{ route("account.destroy") }}"
        onsubmit="return confirm('Você tem certeza que deseja deletar sua conta? Este processo é irreversível e todas as suas informações serão deletadas permanentemente.')"
        class="pt-4"
    >
        @csrf
        @method("DELETE")
        <x-button-outline type="submit" color="red">
            <x-heroicon-s-backspace class="w-5 h-5" />
            <span>Deletar Conta</span>
        </x-button-outline>
    </form>
</div>
