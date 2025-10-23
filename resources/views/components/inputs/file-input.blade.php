@props([
    "label" => "Imagem de capa",
    "name" => "image",
    "accept" => "image/*",
])

<div class="space-y-2">
    <div x-data="{ file: null }" class="space-y-2">
        <label class="block text-sm font-medium text-gray-300">{{ $label }}</label>

        <label
            class="relative flex flex-col items-center justify-center w-full h-40 px-4 transition bg-gray-800/70 border-2 border-dashed border-amber-500/50 rounded-xl cursor-pointer hover:border-amber-400 hover:bg-gray-800/80"
        >
            <template x-if="!file">
                <div class="flex flex-col items-center gap-4">
                    <x-heroicon-s-arrow-down-tray class="w-10 h-10 text-amber-400" />
                    <span class="text-gray-300 text-sm">Clique ou arraste a imagem aqui</span>
                </div>
            </template>

            <template x-if="file">
                <div class="flex flex-col items-center">
                    <img
                        :src="file"
                        alt="Preview"
                        class="w-20 h-20 object-cover rounded-lg mb-2 border border-amber-500/30"
                    />
                    <span class="text-gray-300 text-sm" x-text="file.name"></span>
                </div>
            </template>

            <input
                type="file"
                name="{{ $name }}"
                accept="{{ $accept }}"
                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                @change="file = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : null"
            />
        </label>
    </div>
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
