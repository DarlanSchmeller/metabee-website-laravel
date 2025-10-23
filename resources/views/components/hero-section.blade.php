<section class="relative {{ $bgColor }} py-32 overflow-hidden">
    <x-hexagon-background />
    <x-glowing-circles />

    <div class="relative z-10 max-w-3xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 {{ $textColor }}">
            {!! nl2br(e($title)) !!}
            @if ($highlight)
                @if ($breakTitle)
                    <br />
                @endif

                <span class="bg-gradient-to-r from-amber-400 via-yellow-500 to-amber-600 bg-clip-text text-transparent">
                    {{ $highlight }}
                </span>
            @endif
        </h1>

        @if ($subtitle)
            <p class="text-xl text-gray-300 leading-relaxed">
                {{ $subtitle }}
            </p>
        @endif
    </div>
    {{ $slot }}
</section>
