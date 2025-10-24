@props(["user" => null])

<div class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-6">
    <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
        <x-heroicon-o-book-open class="w-5 h-5 text-amber-500" />
        Estatísticas
    </h3>

    <div class="space-y-4">
        <div class="flex items-center justify-between p-3 bg-gray-800/30 rounded-lg border border-amber-500/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-500/20 rounded-lg flex items-center justify-center">
                    <x-heroicon-o-book-open class="w-5 h-5 text-amber-500" />
                </div>
                <div>
                    <p class="text-sm text-gray-400">Cursos Inscritos</p>
                    <p class="text-xl font-bold text-white">{{ $stats["coursesEnrolled"] ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between p-3 bg-gray-800/30 rounded-lg border border-amber-500/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-500/20 rounded-lg flex items-center justify-center">
                    <x-heroicon-o-cake class="w-5 h-5 text-amber-500" />
                </div>
                <div>
                    <p class="text-sm text-gray-400">Cursos Concluídos</p>
                    <p class="text-xl font-bold text-white">{{ $stats["coursesCompleted"] ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between p-3 bg-gray-800/30 rounded-lg border border-amber-500/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-500/20 rounded-lg flex items-center justify-center">
                    <x-heroicon-o-clock class="w-5 h-5 text-amber-500" />
                </div>
                <div>
                    <p class="text-sm text-gray-400">Horas de Estudo</p>
                    <p class="text-xl font-bold text-white">{{ $stats["hoursLearned"] ?? 0 }}h</p>
                </div>
            </div>
        </div>
    </div>
</div>
