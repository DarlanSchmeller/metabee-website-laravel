@props(['title', 'content', 'buttonText', 'icon' => false, 'link' => ''])

<section class="py-20 relative z-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-3xl p-12 text-center">
            @if($icon)
                <x-heroicon-o-book-open class="w-16 h-16 text-amber-500 mx-auto mb-6" />
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-amber-500 mx-auto mb-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            @endif

            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $title }}</h2>
            <p class="text-gray-400 text-lg mb-8 max-w-2xl mx-auto">
                {{ $content }}
            </p>
            <a href="{{ $link }}">
                <button
                    class="bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-8 py-4 rounded-xl font-semibold hover:shadow-lg hover:shadow-amber-500/50 hover:scale-105 transition-all duration-300">
                    {{ $buttonText }}
                </button>
            </a>
        </div>
    </div>
</section>
