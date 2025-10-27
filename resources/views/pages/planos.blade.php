<x-layout>
    <div class="min-h-screen bg-gray-950 text-white relative overflow-hidden">
        <x-hero-section
            title="Preços"
            highlight="Transparentes"
            subtitle="Escolha o plano perfeito para sua jornada de aprendizado. Todos os planos incluem acesso vitalício aos cursos adquiridos."
            :break-title="true"
        />
        <x-pricing />
        <x-features />
        <x-faq />
        <x-call-to-action
            title="Precisa de uma solução personalizada?"
            content="Oferecemos soluções empresariais sob medida para organizações com necessidades específicas. Entre em
                contato com nossa equipe para discutir sua demanda."
            buttonText="Entre em Contato Conosco"
            link="{{ route('home') }}"
        />
    </div>
</x-layout>
