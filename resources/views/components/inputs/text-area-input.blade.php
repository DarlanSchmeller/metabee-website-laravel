@props([
    "label",
    "name",
    "rows" => 3,
    "placeholder" => "",
    "required" => false,
])

<div class="md:col-span-2 space-y-2">
    <label class="block text-sm font-medium text-gray-300">{{ $label }}</label>
    <textarea
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3.5 focus:border-amber-400 focus:ring-amber-500 focus:ring-1 outline-none"
    >
{{ old($name) }}</textarea
    >
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
