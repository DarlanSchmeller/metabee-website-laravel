@props(["user" => null])

<form
    action="{{ route("home", $user->id) }}"
    method="POST"
    enctype="multipart/form-data"
    class="bg-gradient-to-br from-gray-900 to-gray-900/50 border border-amber-500/20 rounded-2xl p-6 text-white"
>
    @csrf
    @method("PUT")

    <div class="flex items-center justify-between mb-6">
        <h3 class="text-xl font-semibold text-white flex items-center gap-2">
            <x-heroicon-o-user class="w-5 h-5 text-amber-500" />
            Informações Pessoais
        </h3>
        <button
            type="submit"
            class="bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-4 py-2 rounded-lg hover:shadow-lg hover:shadow-amber-500/50 flex items-center gap-2"
        >
            <x-heroicon-o-document-arrow-down class="w-4 h-4" />
            Salvar
        </button>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 mb-6">
        <x-text-input
            label="Nome Completo"
            name="name"
            placeholder="Digite seu nome completo"
            :value="old('name', $user->name)"
        />

        <x-text-input
            label="E-mail"
            name="email"
            placeholder="Digite seu e-mail"
            type="email"
            :value="old('email', $user->email)"
        />

        <x-text-area-input
            label="Biografia"
            name="bio"
            rows="3"
            placeholder="Conte um pouco sobre você"
            :value="old('bio', $user->bio)"
            rows="8"
        />
    </div>
    <x-file-input label="Foto de Perfil" name="user_image" />
</form>
