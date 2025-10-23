<form
    method="POST"
    action="{{ route("cursos.store") }}"
    enctype="multipart/form-data"
    class="bg-gradient-to-br from-gray-900 to-gray-900 border border-amber-500/20 rounded-2xl p-10 md:p-12 text-white shadow-2xl backdrop-blur-xl"
>
    @csrf

    {{-- Etapa 1 — Informações básicas --}}
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
            <x-text-input label="Título do curso" name="title" placeholder="Digite o título do curso" />

            <x-text-input label="Categoria" name="category" placeholder="Digite a categoria" />

            <x-text-area-input
                label="Descrição curta"
                name="description"
                rows="3"
                placeholder="Digite uma descrição curta"
                required
            />

            <x-text-area-input
                label="Descrição completa"
                name="fullDescription"
                rows="5"
                placeholder="Digite a descrição completa do curso"
            />
        </div>
    </div>

    {{-- Etapa 2 — Estrutura e detalhes --}}
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
            @foreach ([
                    ["Duração (horas)", "duration", "number", "1"],
                    ["Aulas", "lessons", "number", "1"],
                    ["Projetos", "projects", "number", "0"],
                    ["Idioma", "language", "text", "Ex: Português"],
                    ['Preço (R$)', "price", "number", "0.00"]
                ]
                as [$label, $name, $type, $placeholder])
                <x-form-input
                    :label="$label"
                    :name="$name"
                    :type="$type"
                    :placeholder="$placeholder"
                    :min="$type === 'number' ? $placeholder : null"
                />
            @endforeach

            <x-select-input
                label="Nível"
                name="level"
                :options="[
                    'iniciante' => 'Iniciante', 
                    'intermediario' => 'Intermediário', 
                    'avançado' => 'Avançado'
                ]"
            />
        </div>
    </div>

    {{-- Etapa 3 — Recursos e publicação --}}
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
                <x-checkbox-input name="certificate" label="Oferece certificado" />
                <x-checkbox-input name="resources" label="Inclui materiais de apoio" />
            </div>

            <x-text-input label="Tags (separadas por vírgula)" name="tags" placeholder="Ex: JavaScript, Web, Backend" />

            <x-text-area-input
                label="O que você vai aprender"
                name="whatYouLearn"
                rows="3"
                placeholder="Digite cada item separado por vírgula"
            />

            <x-text-area-input label="Skills" name="skills" rows="3" placeholder="Ex: JavaScript, Laravel, Tailwind" />

            <x-text-area-input
                label="Currículo do curso"
                name="curriculum"
                rows="3"
                placeholder="Ex: Aula 1: Introdução..."
            />

            <x-text-area-input
                label="Requisitos"
                name="requirements"
                rows="3"
                placeholder="Ex: Conhecimento básico de HTML/CSS"
            />
        </div>
    </div>

    {{-- Navegação --}}
    <div class="flex justify-between items-center pt-10 mt-10 border-t border-amber-500/20">
        <button
            type="button"
            x-show="step > 1"
            @click="step--"
            class="inline-flex items-center px-6 py-3 bg-gray-800/70 hover:bg-gray-700 border border-amber-500/30 text-gray-200 font-medium rounded-xl transition-all"
        >
            <x-heroicon-o-arrow-left class="w-5 h-5 mr-2 text-amber-400" />
            Voltar
        </button>

        <template x-if="step < 3">
            <button
                type="button"
                @click="step++"
                class="ml-auto inline-flex items-center px-7 py-3 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all"
            >
                Próximo
                <x-heroicon-o-arrow-right class="w-5 h-5 ml-2" />
            </button>
        </template>

        <template x-if="step === 3">
            <button
                type="submit"
                class="ml-auto inline-flex items-center px-7 py-3 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all"
            >
                <x-heroicon-o-check class="w-5 h-5 mr-2" />
                Enviar Curso
            </button>
        </template>
    </div>
</form>
