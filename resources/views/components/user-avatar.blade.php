{{-- Avatar --}}
<div
    class="w-10 h-10 rounded-full bg-amber-500/20 border border-amber-500/40 flex items-center justify-center overflow-hidden"
>
    @if (! empty(Auth::user()->user_image) && file_exists(storage_path("app/public/" . Auth::user()->user_image)))
        <img
            src="{{ asset("storage/" . Auth::user()->user_image) }}"
            alt="{{ Auth::user()->name }}"
            class="w-full h-full object-cover"
        />
    @else
        <x-heroicon-o-user class="w-6 h-6 text-amber-400" />
    @endif
</div>

{{-- First name --}}
<span class="font-medium">
    {{ explode(" ", Auth::user()->name)[0] }}
</span>
