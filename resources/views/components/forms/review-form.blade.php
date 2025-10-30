@props([
    "course",
    "reviewed" => true,
])

<form
    method="POST"
    action="{{ $reviewed ? route("review.store", $course->id) : route("review.update", $course->id) }}"
>
    @csrf
    @if ($reviewed)
        @method("PUT")
    @endif

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
                    <button
                        type="button"
                        class="focus:outline-none"
                        @click="rating = {{ $i }}"
                        :class="{
                            'text-amber-400': rating >= {{ $i }},
                            'text-gray-600': rating <
                                {{ $i }}
                        }"
                    >
                        <x-heroicon-s-star class="w-7 h-7 transition-colors duration-150" />
                    </button>
                @endfor

                <input type="hidden" name="rating" x-model="rating" />
            </div>
            @error("rating")
                <p class="text-red-500 text-sm mt-1 text-right">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Comment --}}
    <x-text-area-input name="content" label="Comentário" placeholder="O que você achou do curso?" />

    {{-- Submit --}}
    <div class="flex justify-end mt-6">
        <button
            type="submit"
            class="bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-5 py-2 rounded-xl font-semibold hover:shadow-lg hover:shadow-amber-500/50 hover:scale-105 transition-all duration-300 flex items-center space-x-2"
        >
            <span>{{ $reviewed ? "Atualizar" : "Enviar" }}</span>
            <x-heroicon-o-arrow-right class="w-5 h-5 text-gray-900" />
        </button>
    </div>
</form>
