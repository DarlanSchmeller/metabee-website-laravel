<div class="mb-8 relative w-full" x-data>
    <div class="flex items-center w-full">
        <template x-for="(s, index) in 3" :key="s">
            <div class="flex items-center" :class="{ 'w-full': index < 2 }">
                <!-- Step Circle -->
                <div class="flex flex-col items-center">
                    <div
                        class="w-12 h-12 rounded-full flex items-center justify-center border-2 transition-all"
                        :class="{
                            'bg-gradient-to-br from-amber-500 to-yellow-500 border-amber-500 text-gray-900': step === s,
                            'bg-amber-500/20 border-amber-500 text-amber-500': step > s,
                            'bg-gray-800/50 border-gray-700 text-gray-500': step < s
                        }"
                    >
                        <template x-if="s === 1">
                            <x-heroicon-o-document-text class="w-5 h-5" />
                        </template>
                        <template x-if="s === 2">
                            <x-heroicon-o-academic-cap class="w-5 h-5" />
                        </template>
                        <template x-if="s === 3">
                            <x-heroicon-o-photo class="w-5 h-5" />
                        </template>
                    </div>
                    <span
                        class="mt-2 text-sm font-medium"
                        :class="{
                              'text-amber-400': step === s,
                              'text-amber-500': step > s,
                              'text-gray-500': step < s
                          }"
                        x-text="['Básico','Estrutura','Recursos'][s-1]"
                    ></span>
                </div>

                <!-- Connector Line -->
                <template x-if="index < 2">
                    <div
                        class="h-0.5 flex-grow mx-2 transition-colors"
                        :class="step > s ? 'bg-amber-500' : 'bg-gray-800'"
                    ></div>
                </template>
            </div>
        </template>
    </div>
</div>
