@props([
    "label" => null,
    "type" => "button",
    "px" => "px-8",
    "py" => "py-4",
    "background" => "bg-gradient-to-r from-amber-500 to-yellow-500",
    "text" => "text-gray-900",
    "hover" => "hover:shadow-lg hover:shadow-amber-500/50",
    "rounded" => "rounded-xl",
    "scale" => "hover:scale-105",
    "font" => "font-semibold",
])

<button
    type="{{ $type }}"
    {{
        $attributes->class([
            $background,
            $text,
            $px,
            $py,
            $rounded,
            $hover,
            $scale,
            $font,
            "transition-all duration-300",
        ])
    }}
>
    {{ $slot ?: $label }}
</button>
