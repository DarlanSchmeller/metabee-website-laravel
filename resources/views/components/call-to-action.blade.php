@props([
    "title",
    "content",
    "buttonText",
    "icon" => false,
    "link" => "",
])

<section class="py-20 relative z-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-3xl p-12 text-center"
        >
            @if ($icon)
                <x-heroicon-o-book-open class="w-16 h-16 text-amber-500 mx-auto mb-6" />
            @else
                <x-heroicon-o-chart-pie class="w-20 h-20 mx-auto mb-6 text-amber-400" />
            @endif

            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $title }}</h2>
            <p class="text-gray-400 text-lg mb-8 max-w-2xl mx-auto">
                {{ $content }}
            </p>
            <a href="{{ $link }}">
                <x-button>
                    {{ $buttonText }}
                </x-button>
            </a>
        </div>
    </div>
</section>
