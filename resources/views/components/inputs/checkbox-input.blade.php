@props([
    "name",
    "label",
    "checked" => false,
])

<label class="flex items-center gap-3 cursor-pointer select-none">
    <input type="checkbox" name="{{ $name }}" class="peer sr-only" @checked(old($name, $checked)) />
    <div
        class="w-6 h-6 border-2 border-amber-500/50 rounded-lg flex items-center justify-center relative transition-colors peer-checked:bg-amber-500 peer-checked:border-amber-500"
    ></div>
    <span class="text-gray-300 font-medium">{{ $label }}</span>
</label>
