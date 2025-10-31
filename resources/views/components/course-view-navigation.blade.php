@props(["course" => null])

<div class="flex flex-col md:flex-row justify-between md:justify-start gap-6 md:gap-6 pb-6">
    {{-- Back Button --}}
    <a href="{{ route("cursos.index") }}">
        <x-button-outline color="amber">
            <x-heroicon-o-arrow-left class="w-5 h-5" />
            <span>Voltar para Cursos</span>
        </x-button-outline>
    </a>
    <div class="flex flex-row flex-wrap gap-6">
        @can("update", $course)
            <a href="{{ route("cursos.edit", $course->id) }}">
                <x-button-outline color="blue">
                    <x-heroicon-o-pencil class="w-5 h-5" />
                    <span>Editar Curso</span>
                </x-button-outline>
            </a>
            <form
                action="{{ route("cursos.destroy", $course->id) }}"
                method="POST"
                onsubmit="return confirm('Tem certeza que deseja apagar este curso?')"
            >
                @csrf
                @method("DELETE")
                <x-button-outline color="red" type="submit">
                    <x-heroicon-o-trash class="w-5 h-5" />
                    <span>Deletar Curso</span>
                </x-button-outline>
            </form>
        @endcan
    </div>
</div>
