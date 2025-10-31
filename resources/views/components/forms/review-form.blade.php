@props([
    "course",
    "reviewed" => null,
])

<div class="flex flex-col gap-6">
    {{-- Header & Delete Button --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <x-heroicon-o-star class="w-8 h-8 text-amber-400" />
            <h2 class="text-2xl font-bold text-white">Avaliar Curso</h2>
        </div>

        @if ($reviewed)
            <form
                method="POST"
                action="{{ route("review.delete", $course->id) }}"
                onsubmit="return confirm('Você tem certeza que deseja apagar sua avaliação?');"
                class="flex-shrink-0"
            >
                @csrf
                @method("DELETE")
                <x-button-outline type="submit" color="red">
                    <x-heroicon-o-x-circle class="w-5 h-5 text-red-400" />
                    <span>Apagar Avaliação</span>
                </x-button-outline>
            </form>
        @endif
    </div>

    {{-- Review Form --}}
    <form
        method="POST"
        action="{{ $reviewed ? route("review.update", $course->id) : route("review.store", $course->id) }}"
        class="flex flex-col gap-6"
    >
        @csrf
        @if ($reviewed)
            @method("PUT")
        @endif

        {{-- Rating --}}
        <div
            x-data="{ rating: {{ $reviewed ? $reviewed->rating : 0 }} }"
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4"
        >
            <div class="flex items-center gap-2">
                @for ($i = 1; $i <= 5; $i++)
                    <button
                        type="button"
                        class="focus:outline-none"
                        @click="rating = {{ $i }}"
                        :class="{
                            'text-amber-400': rating >= {{ $i }},
                            'text-gray-600': rating < {{ $i }}
                        }"
                    >
                        <x-heroicon-s-star class="w-7 h-7 transition-colors duration-150" />
                    </button>
                @endfor

                <input type="hidden" name="rating" x-model="rating" />
            </div>
            @error("rating")
                <p class="text-red-500 text-sm mt-1 sm:mt-0">{{ $message }}</p>
            @enderror
        </div>

        {{-- Comment --}}
        <x-text-area-input
            name="content"
            label="Comentário"
            placeholder="O que você achou do curso?"
            :value="$reviewed"
        />

        {{-- Submit --}}
        <div class="flex justify-end">
            <x-button type="submit" px="px-5 flex flex-row gap-2 items-center" py="py-2">
                <span>{{ $reviewed ? "Atualizar" : "Enviar" }}</span>
                <x-heroicon-o-arrow-right class="w-5 h-5 text-gray-900" />
            </x-button>
        </div>
    </form>
</div>
