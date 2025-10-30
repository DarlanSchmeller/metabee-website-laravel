@props(['course'])

<section class="relative py-8 overflow-hidden">
    <div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-8">
        <form method="POST" action="{{ route('review.store', $course->id) }}">
            @csrf

            {{-- Header & Rating Row --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 mb-5">
                <div class="flex items-center gap-3">
                    <x-heroicon-o-star class="w-8 h-8 text-amber-400" />
                    <h2 class="text-2xl font-bold text-white">Avaliar Curso</h2>
                </div>

                {{-- Rating --}}
                <div x-data="{ rating: 0 }" class="flex flex-col items-center sm:items-end">
                    <div class="flex items-center gap-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <button type="button"
                                class="focus:outline-none"
                                @click="rating = {{ $i }}"
                                :class="{ 'text-amber-400': rating >= {{ $i }}, 'text-gray-600': rating < {{ $i }} }">
                                <x-heroicon-s-star class="w-7 h-7 transition-colors duration-150" />
                            </button>
                        @endfor
                        <input type="hidden" name="rating" x-model="rating">
                    </div>
                    @error('rating')
                        <p class="text-red-500 text-sm mt-1 text-right">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Comment --}}
            <div class="mb-5">
                <label for="content" class="block text-sm font-medium text-gray-300 mb-2">Comentário</label>
                <div class="relative">
                    <x-heroicon-o-pencil-square class="absolute left-4 top-4 w-5 h-5 text-gray-500" />
                    <textarea name="content" id="content" rows="4" placeholder="O que você achou do curso?"
                        class="w-full pl-12 pr-4 py-3 bg-gray-800/50 border border-amber-500/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all resize-none"
                        required>{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:shadow-amber-500/50 hover:scale-105 transition-all duration-300 flex items-center space-x-2">
                    <span>Enviar</span>
                    <x-heroicon-o-arrow-right class="w-5 h-5 text-gray-900" />
                </button>
            </div>
        </form>
    </div>
</section>
