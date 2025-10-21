<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
    x-transition:enter="transform ease-out duration-300 transition"
    x-transition:enter-start="translate-y-[-100%] opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
    x-transition:leave="transform ease-in duration-200 transition" x-transition:leave-start="translate-y-0 opacity-100"
    x-transition:leave-end="translate-y-[-100%] opacity-0"
    class="fixed top-24 inset-x-0 flex justify-center z-50 px-4 sm:px-6">

    <div @click="show = false"
        class="cursor-pointer w-full max-w-md flex items-center gap-3 p-4 rounded-xl shadow-2xl border backdrop-blur-md
        {{ session('success')
            ? 'bg-emerald-600/70 border-emerald-400 text-emerald-50'
            : 'bg-rose-600/70 border-rose-400 text-rose-50' }}">

        {{-- Icon --}}
        @if (session('success'))
            <x-heroicon-o-check-circle class="w-6 h-6 text-emerald-200" />
        @else
            <x-heroicon-o-x-circle class="w-6 h-6 text-rose-200" />
        @endif

        {{-- Message --}}
        <p class="flex-1 font-semibold text-sm md:text-base leading-tight tracking-tight">
            {{ session('success') ?? session('error') }}
        </p>

        {{-- Close button --}}
        <button @click="show = false" class="text-gray-200 hover:text-white transition">
            <x-heroicon-o-x-mark class="w-5 h-5" />
        </button>
    </div>
</div>
