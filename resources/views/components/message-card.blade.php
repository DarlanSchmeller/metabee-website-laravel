@props(["message" => null])

<div
    class="bg-gray-800/50 rounded-2xl p-6 border border-amber-500/20 shadow-md shadow-amber-500/10 hover:shadow-amber-500/20 transition-all duration-300"
>
    {{-- Header Info --}}
    <div
        class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-6 border-b border-amber-500/10 pb-5 mb-8"
    >
        <div class="flex flex-col gap-3">
            <div class="flex items-center gap-3">
                <x-heroicon-o-user class="w-5 h-5 text-amber-400" />
                <span class="text-white font-semibold">{{ $message->name }}</span>
            </div>

            <div class="flex items-center gap-3">
                <x-heroicon-o-envelope class="w-5 h-5 text-amber-400" />
                <a
                    href="mailto:{{ $message->email }}"
                    class="text-amber-200 hover:text-amber-100 transition-colors underline underline-offset-2"
                >
                    {{ $message->email }}
                </a>
            </div>
        </div>

        <div class="flex items-center gap-2 text-gray-400 text-sm">
            <x-heroicon-o-calendar class="w-5 h-5 text-amber-400" />
            <span>Recebido em {{ $message->created_at->format("d/m/Y H:i") }}</span>
        </div>
    </div>

    {{-- Message Content --}}
    <div class="relative bg-gray-900/40 border border-amber-500/10 rounded-xl p-5">
        <div class="absolute -top-3 left-4 bg-gray-900 px-2 text-sm text-amber-400 flex items-center gap-1">
            <x-heroicon-o-chat-bubble-left-ellipsis class="w-4 h-4" />
            <span>Mensagem</span>
        </div>
        <p class="text-gray-200 leading-relaxed whitespace-pre-line">
            {{ $message->message }}
        </p>
    </div>

    {{-- Delete Button --}}
    <div class="mt-6 flex justify-end">
        <form
            action="{{ route("message.destroy", $message->id) }}"
            method="POST"
            onsubmit="return confirm('Tem certeza que deseja excluir esta mensagem?');"
        >
            @csrf
            @method("DELETE")
            <button
                type="submit"
                class="inline-flex items-center space-x-2 bg-gray-800/60 hover:bg-gray-700/80 text-red-400 hover:text-red-300 font-semibold px-5 py-3 rounded-lg shadow-md hover:shadow-red-500/40 transition-all duration-200 border border-red-500/30"
            >
                <x-heroicon-o-trash class="w-4 h-4" />
                <span>Excluir</span>
            </button>
        </form>
    </div>
</div>
