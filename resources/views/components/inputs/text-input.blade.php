@props([
    "label",
    "name",
    "placeholder" => "",
    "required" => true,
    "type" => "text",
])

<div class="space-y-2">
    <label class="block text-sm font-medium text-gray-300">{{ $label }}</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3.5 focus:border-amber-400 focus:ring-amber-500 focus:ring-1 outline-none"
    />
</div>
