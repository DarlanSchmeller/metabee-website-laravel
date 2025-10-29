<section class="relative py-20 overflow-hidden" id="contact">
    <div class="absolute inset-0">
        <img src="{{ asset("images/contato.jpg") }}" alt="Fundo de Robótica" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-br from-gray-950/40 via-gray-900/70 to-gray-950/80"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="bg-gradient-to-br from-gray-900 to-gray-900/50 rounded-3xl p-12 border border-amber-500/20 shadow-2xl shadow-amber-500/10"
        >
            @if (! session("message_sent"))
                <div class="text-center mb-10">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-amber-500/20 to-yellow-500/20 rounded-2xl mb-6 border border-amber-500/30"
                    >
                        <x-heroicon-o-pencil-square class="w-8 h-8 text-amber-400" />
                    </div>

                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Fale Conosco</h2>

                    <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                        Tem dúvidas sobre nossos cursos? Quer saber mais sobre a MetaBee? Nós adoraríamos ouvir você.
                    </p>
                </div>

                <form method="POST" action="{{ route("message.store") }}" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nome Completo</label>
                            <div class="relative">
                                <x-heroicon-o-user
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500"
                                />
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old("name") }}"
                                    placeholder="João da Silva"
                                    class="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-amber-500/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
                                    required
                                />
                                @error("name")
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                            <div class="relative">
                                <x-heroicon-o-envelope
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500"
                                />
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    value="{{ old("email") }}"
                                    placeholder="joao@email.com"
                                    class="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-amber-500/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all"
                                    required
                                />
                                @error("email")
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Mensagem</label>
                        <div class="relative">
                            <x-heroicon-o-chat-bubble-left-ellipsis
                                class="absolute left-4 top-4 w-5 h-5 text-gray-500"
                            />
                            <textarea
                                name="message"
                                id="message"
                                rows="5"
                                placeholder="Conte-nos sobre suas dúvidas..."
                                class="w-full pl-12 pr-4 py-4 bg-gray-800/50 border border-amber-500/20 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all resize-none"
                                required
                            >
{{ old("message") }}</textarea
                            >
                            @error("message")
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-amber-500 to-yellow-500 text-gray-900 px-8 py-4 rounded-xl font-semibold hover:shadow-lg hover:shadow-amber-500/50 hover:scale-105 transition-all duration-300 flex items-center justify-center space-x-2"
                    >
                        <span>Enviar Mensagem</span>
                        <x-heroicon-o-arrow-right class="w-6 h-6 text-gray-900" />
                    </button>
                </form>
            @else
                {{-- Success Message --}}
                <div class="py-12 text-center">
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-500/20 to-emerald-500/20 rounded-full mb-6 border border-green-500/30"
                    >
                        <x-heroicon-o-signal class="w-10 h-10 text-green-400" />
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">Mensagem enviada!</h3>
                    <p class="text-gray-400">Obrigado por entrar em contato! Retornaremos em breve com uma resposta.</p>
                </div>
            @endif

            <div class="mt-6 text-center text-sm text-gray-500">
                Ao enviar esta mensagem, você concorda com nossa Política de Privacidade e Termos de Serviço.
            </div>
        </div>
    </div>
</section>
