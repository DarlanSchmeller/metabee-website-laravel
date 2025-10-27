@props(["user" => null])

<div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-6 text-center">
    <div class="relative mb-4">
        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-amber-500/30 mx-auto">
            <img
                src="{{ asset("storage/" . $user->user_image) }}"
                alt="{{ $user->name }}"
                class="w-full h-full object-cover"
            />
        </div>
    </div>

    <h2 class="text-2xl font-bold text-white mb-1">{{ $user->name }}</h2>
    <p class="text-gray-400 text-sm mb-3">{{ $user->email }}</p>

    <div
        class="inline-flex items-center gap-2 px-4 py-1.5 bg-amber-500/10 border border-amber-500/30 rounded-full mx-auto"
    >
        <x-heroicon-o-cake class="w-4 h-4 text-amber-500" />
        <span class="text-sm font-medium text-amber-400">{{ ucfirst($user->role) }}</span>
    </div>

    <div class="flex items-center gap-2 mt-4 text-sm text-gray-400 justify-center">
        <x-heroicon-o-calendar class="w-4 h-4" />
        <span>Membro desde {{ $user->created_at->format("d/m/Y") }}</span>
    </div>
</div>
