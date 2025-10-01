<x-layout>
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gray-950">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l25.98 15v30L30 60 4.02 45V15z' fill='none' stroke='%23fbbf24' stroke-width='0.5'/%3E%3C/svg%3E&quot;); background-size: 60px 60px">></div>
        </div>

        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="
                background-image: url('data:image/svg+xml,%3Csvg width=60 height=60 viewBox=0 0 60 60 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M30 0l25.98 15v30L30 60 4.02 45V15z%22 fill=%22none%22 stroke=%22%23fbbf24%22 stroke-width=%220.5%22/%3E%3C/svg%3E');
                background-size: 60px 60px;
            "></div>
        </div>

        <div class="absolute top-20 right-20 w-96 h-96 bg-amber-500/20 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-yellow-500/20 rounded-full filter blur-3xl"></div>

        <div class="relative z-10 max-w-3xl mx-auto px-6 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="w-20 h-20 text-amber-500 mx-auto mb-8 animate-bounce" 
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35M9.5 17A7.5 7.5 0 109.5 2a7.5 7.5 0 000 15z" />
            </svg>

            <h1 class="flex items-center justify-center gap-3 text-5xl md:text-6xl font-extrabold mb-6">
                <span class="text-white px-2">Erro</span>
                <span class="bg-gradient-to-r from-amber-400 via-yellow-500 to-amber-600 bg-clip-text text-transparent animate-gradient-x">404</span>
            </h1>

            <p class="text-gray-400 text-lg mb-10 leading-relaxed max-w-xl mx-auto">
                Ops! O conteúdo que você procura não existe ou foi movido.  
                Que tal voltar para a página inicial?
            </p>

            <a href="{{ url('/') }}" 
               class="inline-block px-8 py-4 bg-amber-500 text-black font-semibold text-lg rounded-xl shadow-lg hover:bg-amber-600 hover:scale-105 transform transition">
                Voltar para Página Inicial
            </a>
        </div>
    </section>
</x-layout>
