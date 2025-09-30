<footer class="bg-slate-900 text-gray-300 border-t border-slate-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-6 gap-8">
            <div class="lg:col-span-2">
                <div class="flex items-center space-x-3 mb-6">

                    {{-- Logo --}}
                    <div class="relative w-10 h-10">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-amber-400 via-yellow-500 to-amber-600 rounded-lg rotate-45">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-900 -rotate-45" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L21 7v10l-9 5-9-5V7z"></path>
                            </svg>
                        </div>
                    </div>

                    <span
                        class="text-xl font-bold bg-gradient-to-r from-amber-400 to-yellow-500 bg-clip-text text-transparent">MetaBee</span>
                </div>

                <p class="text-gray-400 mb-6 leading-relaxed">
                    Capacitando a próxima geração de engenheiros e inovadores em robótica
                    através de educação online de ponta e experiências práticas.
                </p>

                <div class="flex space-x-4">
                    @foreach ($socialLinks as $social)
                        <a href="{{ $social['href'] }}"
                            class="w-10 h-10 bg-gray-900 border border-amber-500/30 rounded-lg flex items-center
                            justify-center hover:bg-amber-500 hover:border-amber-500 hover:text-gray-900 transition-all
                            duration-300 text-sm font-bold text-white">
                            {{ strtoupper(substr($social['icon'], 0, 1)) }}
                        </a>
                    @endforeach
                </div>
            </div>

            @foreach ($footerSections as $section)
                <div>
                    <h3 class="font-semibold text-white mb-4">{{ $section['title'] }}</h3>
                    <ul class="space-y-3">
                        @foreach ($section['links'] as $link)
                            <li>
                                <a href="#"
                                    class="text-gray-400 hover:text-amber-400 transition-colors duration-300">{{ $link }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        <div class="border-t border-amber-500/20 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">© {{ date('Y') }} MetaBee. Todos os direitos reservados.</p>

                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-amber-400 text-sm transition-colors">Política de
                        Privacidade</a>
                    <a href="#" class="text-gray-400 hover:text-amber-400 text-sm transition-colors">Termos de
                        Serviço</a>
                    <a href="#" class="text-gray-400 hover:text-amber-400 text-sm transition-colors">Política de
                        Cookies</a>
                </div>
            </div>
        </div>
    </div>
</footer>
