<form method="GET" action="{{ route("cursos.search") }}">
    <div class="max-w-2xl mx-auto mb-8 md:px-0 px-8">
        <div class="relative">
            <x-heroicon-o-magnifying-glass
                class="absolute left-4 top-1/2 transform -translate-y-1/2 w-6 h-6 text-gray-500"
            />
            <input
                type="text"
                name="keywords"
                placeholder="Buscar cursos..."
                value="{{ request("keywords") }}"
                class="w-full pl-12 pr-4 py-4 bg-gray-900/50 border border-amber-500/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
            />
        </div>
    </div>
    <div class="flex flex-wrap justify-center gap-3">
        @foreach ($categories as $cat)
            <label class="relative">
                {{-- Hidden checkbox first (important for peer to work) --}}
                <input
                    onchange="this.form.submit()"
                    type="checkbox"
                    name="categories[]"
                    value="{{ $cat["label"] }}"
                    class="peer hidden"
                    {{ in_array($cat["label"], (array) request("categories", [])) ? "checked" : "" }}
                />

                {{-- Styled content --}}
                <div
                    class="flex items-center space-x-2 px-4 py-2 rounded-xl font-medium cursor-pointer transition-all duration-300 border border-amber-500/20 bg-gray-900/50 text-gray-300 hover:border-amber-500/40 peer-checked:bg-gradient-to-r peer-checked:from-amber-500 peer-checked:to-yellow-500 peer-checked:text-gray-900 peer-checked:shadow-lg peer-checked:shadow-amber-500/30"
                >
                    <div class="text-amber-400 transition-colors duration-300 peer-checked:text-gray-900">
                        <x-dynamic-component :component="'heroicon-o-' . $cat['icon']" class="w-5 h-5" />
                    </div>
                    <span>{{ $cat["label"] }}</span>
                </div>
            </label>
        @endforeach
    </div>
</form>
