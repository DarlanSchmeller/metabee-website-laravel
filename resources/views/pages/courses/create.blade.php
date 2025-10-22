<x-layout>
    <div 
        x-data="{ step: 1 }" 
        class="min-h-screen bg-gray-950 relative pt-24 pb-16"
    >
        {{-- Glow decorativo --}}
        <div class="absolute top-20 right-20 w-96 h-96 bg-amber-500/20 rounded-full filter blur-3xl"></div>

        <div class="relative max-w-5xl mx-auto px-6 lg:px-8">
            {{-- Header --}}
            <div class="flex flex-col items-center mb-10">
                <h1 class="text-4xl md:text-5xl font-bold text-white text-center mb-3">
                    Criar Novo Curso
                </h1>
            </div>

            {{-- Progress Bar --}}
            <x-progress-bar />

            {{-- Form Container --}}
            <form 
                method="POST" 
                action="{{ route('cursos.store') }}" 
                enctype="multipart/form-data"
                class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-10 text-white shadow-2xl backdrop-blur-xl space-y-10"
            >
                @csrf

                {{-- Etapa 1 — Informações básicas --}}
                <div x-show="step === 1" x-transition>
                    <h2 class="text-2xl font-bold mb-6 text-amber-300 flex items-center gap-2">
                        <x-heroicon-o-document-text class="w-6 h-6 text-amber-400" />
                        Informações Básicas
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Título do curso</label>
                            <input type="text" name="title" required
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Categoria</label>
                            <input type="text" name="category" required
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-2 text-gray-300">Descrição curta</label>
                            <textarea name="description" rows="3" required
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none"></textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-2 text-gray-300">Descrição completa</label>
                            <textarea name="fullDescription" rows="5"
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none"></textarea>
                        </div>
                    </div>
                </div>

                {{-- Etapa 2 — Estrutura e detalhes --}}
                <div x-show="step === 2" x-transition>
                    <h2 class="text-2xl font-bold mb-6 text-amber-300 flex items-center gap-2">
                        <x-heroicon-o-academic-cap class="w-6 h-6 text-amber-400" />
                        Estrutura e Detalhes
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Duração (horas)</label>
                            <input type="number" name="duration" min="1"
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Aulas</label>
                            <input type="number" name="lessons" min="1"
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Projetos</label>
                            <input type="number" name="projects" min="0"
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Idioma</label>
                            <input type="text" name="language" placeholder="Ex: Português"
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Preço (R$)</label>
                            <input type="number" step="0.01" name="price" placeholder="0.00"
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Nível</label>
                            <select name="level"
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none">
                                <option value="iniciante">Iniciante</option>
                                <option value="intermediario">Intermediário</option>
                                <option value="avancado">Avançado</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Etapa 3 — Recursos e publicação --}}
                <div x-show="step === 3" x-transition>
                    <h2 class="text-2xl font-bold mb-6 text-amber-300 flex items-center gap-2">
                        <x-heroicon-o-photo class="w-6 h-6 text-amber-400" />
                        Recursos e Publicação
                    </h2>

                    <div class="space-y-8">
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Imagem de capa</label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 file:bg-amber-600 file:text-white file:px-4 file:py-2 file:rounded-lg file:border-none hover:file:bg-amber-500 transition-all">
                        </div>

                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="certificate" id="certificate" checked
                                    class="rounded border-gray-600 text-amber-500 focus:ring-amber-400">
                                <label for="certificate" class="text-gray-300">Oferece certificado</label>
                            </div>

                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="resources" id="resources" checked
                                    class="rounded border-gray-600 text-amber-500 focus:ring-amber-400">
                                <label for="resources" class="text-gray-300">Inclui materiais de apoio</label>
                            </div>

                            <div class="flex items-center gap-2">
                                <input type="checkbox" name="is_published" id="is_published"
                                    class="rounded border-gray-600 text-amber-500 focus:ring-amber-400">
                                <label for="is_published" class="text-gray-300">Publicar imediatamente</label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Tags (separadas por vírgula)</label>
                            <input type="text" name="tags" placeholder="Ex: JavaScript, Web, Backend"
                                class="w-full bg-gray-800/70 border border-amber-500/30 rounded-xl px-4 py-3 focus:border-amber-400 focus:ring-amber-400 focus:ring-1 outline-none">
                        </div>
                    </div>
                </div>

                {{-- Navegação --}}
                <div class="flex justify-between items-center pt-10 border-t border-amber-500/20">
                    <button 
                        type="button" 
                        x-show="step > 1"
                        @click="step--"
                        class="inline-flex items-center px-5 py-3 bg-gray-800/70 hover:bg-gray-700 border border-amber-500/30 text-gray-200 font-semibold rounded-xl transition-all"
                    >
                        <x-heroicon-o-arrow-left class="w-5 h-5 mr-2 text-amber-400" /> Voltar
                    </button>

                    <template x-if="step < 3">
                        <button 
                            type="button" 
                            @click="step++"
                            class="ml-auto inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all"
                        >
                            Próximo <x-heroicon-o-arrow-right class="w-5 h-5 ml-2" />
                        </button>
                    </template>

                    <template x-if="step === 3">
                        <button 
                            type="submit"
                            class="ml-auto inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all"
                        >
                            <x-heroicon-o-check class="w-5 h-5 mr-2" /> Enviar Curso
                        </button>
                    </template>
                </div>
            </form>
        </div>
    </div>
</x-layout>
