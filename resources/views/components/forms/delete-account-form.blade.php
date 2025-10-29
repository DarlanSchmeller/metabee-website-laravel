<form
    method="POST"
    action="{{ route("account.destroy") }}"
    onsubmit="return confirm('Você tem certeza que deseja deletar sua conta? Este processo é irreversível e todas suas informações serão deletadas permanentemente.')"
>
    @csrf
    @method("DELETE")
    <button
        type="submit"
        class="inline-flex items-center space-x-2 bg-gray-800/60 hover:bg-gray-700/80 text-red-400 hover:text-red-300 font-semibold px-5 py-3 rounded-lg shadow-md hover:shadow-red-500/40 transition-all duration-200 border border-red-500/30 mb-6"
    >
        <x-heroicon-s-backspace class="w-5 h-5" />
        <span>Deletar Conta</span>
    </button>
</form>
