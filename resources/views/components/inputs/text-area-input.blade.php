@props([
    "label",
    "name",
    "rows" => 3,
    "placeholder" => "",
    "required" => false,
    "value" => "",
])

<div class="md:col-span-2">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-300 mb-2">
        {{ $label }}
    </label>

    <div class="relative">
        <x-heroicon-o-pencil-square class="absolute left-4 top-4 w-5 h-5 text-gray-500 pointer-events-none" />

        <textarea
            id="{{ $name }}"
            name="{{ $name }}"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            @if ($required) required @endif
            class="w-full pl-12 pr-4 py-3.5 bg-gray-800/70 border border-amber-500/30 rounded-xl text-white placeholder-gray-500 focus:border-amber-400 focus:ring-amber-500 focus:ring-1 outline-none resize-none transition-all"
        >
{{ old($name, $value) }}</textarea
        >

        @error($name)
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
