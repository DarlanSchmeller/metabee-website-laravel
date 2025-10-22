<x-layout>
    <div class="min-h-screen bg-gray-950">
        <x-hero-section
            title="Explore Nossos"
            highlight="Cursos"
            :break-title="true"
            content="Escolha entre dezenas de cursos desenvolvidos por especialistas da indústria e avance do básico ao profissional."
        >
            <x-search-bar />
        </x-hero-section>

        <x-courses-grid :courses="$courses" />

        <x-call-to-action
            title="Não encontrou o que procurava?"
            content="Estamos sempre adicionando novos cursos. Entre em contato para sugerir temas ou solicitar treinamentos personalizados para sua equipe."
            buttonText="Fale Conosco"
            :icon="true"
        />
    </div>
</x-layout>
