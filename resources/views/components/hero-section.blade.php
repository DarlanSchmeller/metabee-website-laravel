<section class="relative {{ $bgColor }} py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0"
            style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M30 0l25.98 15v30L30 60 4.02 45V15z\' fill=\'none\' stroke=\'%23fbbf24\' stroke-width=\'0.5\'/%3E%3C/svg%3E');
                   background-size: 60px 60px;">
        </div>
    </div>

    <div class="absolute top-20 right-20 w-96 h-96 bg-amber-500/20 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-20 left-20 w-96 h-96 bg-yellow-500/20 rounded-full filter blur-3xl"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 {{ $textColor }}">
            {!! nl2br(e($title)) !!}
            @if ($highlight)
                <br>
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
</section>
