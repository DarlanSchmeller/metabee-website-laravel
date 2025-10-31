@props([
    "label" => null,
    "type" => "button",
    "color" => "red",
])

<button
    type="{{ $type }}"
    {{
        $attributes->merge([
            "class" => "inline-flex items-center space-x-2 bg-gray-800/60 hover:bg-gray-700/80 font-semibold px-5 py-3 rounded-lg
                        shadow-md transition-all duration-200 border {$colorClass[$color]}",
        ])
    }}
>
    {{ $slot ?: $label }}
</button>
