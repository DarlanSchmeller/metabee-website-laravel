<section class="py-20 relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-3 gap-8">
        @foreach ($plans as $plan)
            <div
                class="relative bg-gradient-to-br from-gray-900 to-gray-900/50 rounded-3xl p-8 transition-all duration-300 border {{
                    $plan["highlighted"] ? "border-2 border-amber-500 shadow-2xl shadow-amber-500/20 scale-105 lg:scale-110" : "border-amber-500/20 hover:border-amber-500/40 hover:shadow-xl hover:shadow-amber-500/10"
                }}"
            >
                @if ($plan["highlighted"])
                    <span
                        class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-4 py-1 rounded-full text-sm font-semibold"
                    >
                        Mais Popular
                    </span>
                @endif

                <div class="mb-8 flex items-center space-x-4">
                    <div
                        class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-amber-500/20 to-yellow-500/20 rounded-xl border border-amber-500/30"
                    >
                        {{-- Dynamic Heroicon --}}
                        <x-dynamic-component
                            :component="'heroicon-o-' . $plan['icon']"
                            class="h-7 w-7 text-amber-500 stroke-current"
                        />
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold">{{ $plan["name"] }}</h3>
                        <p class="text-gray-400 text-sm">{{ $plan["description"] }}</p>
                    </div>
                </div>

                <div class="mb-8 flex items-baseline">
                    <span class="text-5xl font-bold">${{ $plan["price"] }}</span>
                    <span class="text-gray-400 ml-2">/{{ $plan["period"] }}</span>
                </div>

                <ul class="space-y-4 mb-8">
                    @foreach ($plan["features"] as $feature)
                        <li class="flex items-start">
                            <x-heroicon-o-check class="w-5 h-5 text-amber-500 mr-3 mt-0.5 stroke-current" />
                            <span class="text-gray-300 text-sm">{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>

                @if (auth()->check())
                    <form method="POST" action="{{ route("account.upgrade", strtolower($plan["name"])) }}">
                        @csrf
                        <button
                            class="w-full py-4 rounded-xl font-semibold transition-all duration-300 {{
                                $plan["highlighted"] ? "bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 hover:scale-105" : "bg-gray-800 text-white border border-amber-500/30 hover:bg-gray-700 hover:border-amber-500/50"
                            }}"
                        >
                            Escolher Plano
                        </button>
                    </form>
                @else
                    <a href="{{ route("login") }}">
                        <button
                            class="w-full py-4 rounded-xl font-semibold transition-all duration-300 {{
                                $plan["highlighted"] ? "bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 hover:scale-105" : "bg-gray-800 text-white border border-amber-500/30 hover:bg-gray-700 hover:border-amber-500/50"
                            }}"
                        >
                            Escolher Plano
                        </button>
                    </a>
                @endif
            </div>
        @endforeach
    </div>
</section>
