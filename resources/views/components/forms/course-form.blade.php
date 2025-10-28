@props(["course" => null])

<form
    method="POST"
    action="{{ ! empty($course) ? route("cursos.update", $course->id) : route("cursos.store") }}"
    enctype="multipart/form-data"
    class="bg-gradient-to-br from-gray-900 to-gray-900 border border-amber-500/20 rounded-2xl p-10 md:p-12 text-white shadow-2xl backdrop-blur-xl"
>
    @csrf
    @if (! empty($course))
        @method("PUT")
    @endif

    {{-- Step 1 - Basics --}}
    <div x-show="step === 1" x-transition>
        <div class="flex items-center gap-4 mb-8">
            <div
                class="inline-flex items-center justify-center w-14 h-14 bg-amber-500/10 border border-amber-500/30 rounded-2xl"
            >
                <x-heroicon-o-document-text class="w-7 h-7 text-amber-400" />
            </div>
            <h2 class="text-2xl font-semibold text-gray-100">Informações Básicas</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <x-text-input
                label="Título do curso"
                name="title"
                placeholder="Digite o título do curso"
                :value="old('title', $course?->title ?? '')"
            />

            <x-select-input
                label="Categoria"
                name="category"
                :options="$courseCategories"
                :selected="$course?->category"
            />

            <x-text-area-input
                label="Descrição curta"
                name="description"
                rows="3"
                placeholder="Digite uma descrição curta"
                required
                :value="old('description', $course?->description ?? '')"
            />

            <x-text-area-input
                label="Descrição completa"
                name="fullDescription"
                rows="5"
                placeholder="Digite a descrição completa do curso"
                :value="old('fullDescription', $course?->fullDescription ?? '')"
            />
        </div>
    </div>

    {{-- Step 2 - Structure --}}
    <div x-show="step === 2" x-transition>
        <div class="flex items-center gap-4 mb-8">
            <div
                class="inline-flex items-center justify-center w-14 h-14 bg-amber-500/10 border border-amber-500/30 rounded-2xl"
            >
                <x-heroicon-o-academic-cap class="w-7 h-7 text-amber-400" />
            </div>
            <h2 class="text-2xl font-semibold text-gray-100">Estrutura e Detalhes</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach ($courseFields as [$label, $name, $type, $placeholder, $step])
                <x-form-input
                    :label="$label"
                    :name="$name"
                    :type="$type"
                    :placeholder="$placeholder"
                    :min="$type === 'number' ? $placeholder : null"
                    :step="$step"
                    :value="old($name, $course?->$name ?? '')"
                />
            @endforeach

            <x-select-input
                label="Nível"
                name="level"
                :options="[
                    'iniciante' => 'Iniciante',
                    'intermediario' => 'Intermediário',
                    'avançado' => 'Avançado',
                ]"
                :selected="$course?->level"
            />
        </div>

        {{-- Curriculum --}}
        <div
            x-data="curriculumBuilder(
                        {{
                            json_encode(
                                old(
                                    "modules",
                                    $course?->modules
                                        ->map(
                                            fn ($m) => [
                                                "module" => $m->title,
                                                "lessons" => $m->lessons,
                                                "duration" => $m->duration,
                                            ],
                                        )
                                        ->toArray() ?? [["module" => "", "lessons" => 1, "duration" => ""]],
                                ),
                            )
                        }},
                        {{ json_encode($errors->toArray()) }},
                    )"
            class="space-y-8 mt-14 pt-14 border-amber-500/30 border-t"
        >
            <div class="flex items-center gap-4 mb-4">
                <div
                    class="inline-flex items-center justify-center w-14 h-14 bg-amber-500/10 border border-amber-500/30 rounded-2xl"
                >
                    <x-heroicon-o-book-open class="w-7 h-7 text-amber-400" />
                </div>
                <h2 class="text-2xl font-semibold text-gray-100">Currículo do Curso</h2>
            </div>

            <template x-for="(module, index) in modules" :key="index">
                <div
                    class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-gray-900/50 border border-amber-500/20 rounded-2xl p-6 relative"
                >
                    <button
                        type="button"
                        class="absolute top-3 right-3 text-red-400 hover:text-red-500"
                        @click="removeModule(index)"
                        title="Remover módulo"
                    >
                        <x-heroicon-o-x-mark class="w-5 h-5" />
                    </button>

                    <div>
                        <label class="block text-gray-200 mb-1">Nome do módulo</label>
                        <input
                            type="text"
                            :name="'modules[' + index + '][module]'"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white"
                            placeholder="Ex: Introdução à Robótica"
                            x-model="module.module"
                        />
                        <p
                            x-show="getError(index, 'module')"
                            x-text="getError(index, 'module')"
                            class="text-red-500 text-sm mt-1"
                        ></p>
                    </div>

                    <div>
                        <label class="block text-gray-200 mb-1">Total de Aulas</label>
                        <input
                            type="number"
                            :name="'modules[' + index + '][lessons]'"
                            min="1"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white"
                            x-model="module.lessons"
                        />
                        <p
                            x-show="getError(index, 'lessons')"
                            x-text="getError(index, 'lessons')"
                            class="text-red-500 text-sm mt-1"
                        ></p>
                    </div>

                    <div>
                        <label class="block text-gray-200 mb-1">Duração Total</label>
                        <input
                            type="text"
                            :name="'modules[' + index + '][duration]'"
                            class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white"
                            placeholder="Ex: 45 min"
                            x-model="module.duration"
                        />
                        <p
                            x-show="getError(index, 'duration')"
                            x-text="getError(index, 'duration')"
                            class="text-red-500 text-sm mt-1"
                        ></p>
                    </div>
                </div>
            </template>

            <button
                type="button"
                @click="addModule"
                class="inline-flex items-center gap-2 bg-amber-500/20 text-amber-400 px-4 py-2 rounded-lg hover:bg-amber-500/30 transition"
            >
                <x-heroicon-o-plus class="w-5 h-5" />
                Adicionar módulo
            </button>
        </div>
    </div>

    {{-- Step 3 - Resources --}}
    <div x-show="step === 3" x-transition>
        <div class="flex items-center gap-4 mb-8">
            <div
                class="inline-flex items-center justify-center w-14 h-14 bg-amber-500/10 border border-amber-500/30 rounded-2xl"
            >
                <x-heroicon-o-photo class="w-7 h-7 text-amber-400" />
            </div>
            <h2 class="text-2xl font-semibold text-gray-100">Recursos e Publicação</h2>
        </div>

        <div class="space-y-8">
            <x-file-input />

            <div class="grid sm:grid-cols-2 gap-6">
                <x-checkbox-input
                    name="certificate"
                    label="Oferece certificado"
                    :checked="old('certificate', $course?->certificate ?? '')"
                />
                <x-checkbox-input
                    name="resources"
                    label="Inclui materiais de apoio"
                    :checked="old('resources', $course?->resources ?? '')"
                />
            </div>

            <x-text-input
                label="Tags (separadas por vírgula)"
                name="tags"
                placeholder="Ex: JavaScript, Web, Backend"
                :value="old(
                    'tags',
                    is_array($course?->tags ?? null) ? implode(', ', $course->tags) : $course?->tags ?? '',
                )"
            />

            <x-text-area-input
                label="O que você vai aprender (separado por vírgula)"
                name="whatYouLearn"
                rows="3"
                placeholder="Digite cada item separado por vírgula"
                :value="old(
                    'whatYouLearn',
                    is_array($course?->whatYouLearn ?? null)
                        ? implode(', ', $course->whatYouLearn)
                        : $course?->whatYouLearn ?? '',
                )"
            />

            <x-text-area-input
                label="Skills (separadas por vírgula)"
                name="skills"
                rows="3"
                placeholder="Ex: JavaScript, Laravel, Tailwind"
                :value="old(
                    'skills',
                    is_array($course?->skills ?? null) ? implode(', ', $course->skills) : $course?->skills ?? '',
                )"
            />

            <x-text-area-input
                label="Requisitos (separados por vírgula)"
                name="requirements"
                rows="3"
                placeholder="Ex: Conhecimento básico de HTML/CSS"
                :value="old(
                    'requirements',
                    is_array($course?->requirements ?? null)
                        ? implode(', ', $course->requirements)
                        : $course?->requirements ?? '',
                )"
            />
        </div>
    </div>

    {{-- Navigation --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 pt-10 mt-10 border-t border-amber-500/20">
        {{-- Back button --}}
        <button
            type="button"
            x-show="step > 1"
            @click="step--"
            class="w-full md:w-auto inline-flex justify-center items-center px-6 py-3 bg-gray-800/70 hover:bg-gray-700 border border-amber-500/30 text-gray-200 font-medium rounded-xl transition-all"
        >
            <x-heroicon-o-arrow-left class="w-5 h-5 mr-2 text-amber-400" />
            Voltar
        </button>

        {{-- Next button --}}
        <template x-if="step < 3">
            <button
                type="button"
                @click="step++"
                class="w-full md:w-auto ml-0 md:ml-auto inline-flex justify-center items-center px-7 py-3 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all"
            >
                Próximo
                <x-heroicon-o-arrow-right class="w-5 h-5 ml-2" />
            </button>
        </template>

        {{-- Submit button --}}
        <template x-if="step === 3">
            <button
                type="submit"
                class="w-full md:w-auto ml-0 md:ml-auto inline-flex justify-center items-center px-7 py-3 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all"
            >
                <x-heroicon-o-check class="w-5 h-5 mr-2" />
                Enviar Curso
            </button>
        </template>
    </div>
</form>
