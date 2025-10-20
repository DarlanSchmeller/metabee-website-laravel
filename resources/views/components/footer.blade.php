<footer class="bg-slate-900 text-gray-300 border-t border-amber-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid lg:grid-cols-6 gap-8 place-items-center lg:place-items-start text-center lg:text-left">
            <div class="lg:col-span-2">
                <div class="flex md:flex-row md:items-center flex-col items-center md:space-x-3 space-y-3 mb-6">
                    <x-logo />
                    <span
                        class="text-xl font-bold bg-gradient-to-r from-amber-400 to-yellow-500 bg-clip-text text-transparent">
                        MetaBee
                    </span>
                </div>

                <p class="text-gray-400 mb-6 leading-relaxed max-w-sm mx-auto lg:mx-0">
                    Capacitando a próxima geração de profissionais e inovadores em tecnologia
                    através de educação online de ponta e experiências práticas.
                </p>

                <div class="flex justify-center lg:justify-start space-x-4">
                    <div class="flex justify-center lg:justify-start space-x-4">
                        <a href="#" target="_blank" class="text-gray-400 hover:text-amber-500 transition-colors">
                            {{-- YouTube --}}
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19.615 3.184c-1.303-.872-6.615-.872-6.615-.872s-5.312 0-6.615.872C4.325 4.056 3.5 6.665 3.5 12c0 5.335.825 7.944 2.885 8.816 1.303.872 6.615.872 6.615.872s5.312 0 6.615-.872C19.675 19.944 20.5 17.335 20.5 12c0-5.335-.825-7.944-2.885-8.816zM10 15.5v-7l6 3.5-6 3.5z" />
                            </svg>
                        </a>

                        <a href="#" target="_blank" class="text-gray-400 hover:text-amber-500 transition-colors">
                            {{-- LinkedIn --}}
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M4.98 3.5C3.34 3.5 2 4.85 2 6.5S3.34 9.5 4.98 9.5s2.98-1.35 2.98-3s-1.35-3-2.98-3zM2.5 21h5v-11h-5v11zM9.5 10h4.79v1.59h.07c.67-1.27 2.31-2.59 4.76-2.59 5.09 0 6.03 3.35 6.03 7.7V21h-5v-6.42c0-1.53-.03-3.5-2.13-3.5-2.13 0-2.46 1.66-2.46 3.38V21h-5v-11z" />
                            </svg>
                        </a>

                        <a href="#" target="_blank" class="text-gray-400 hover:text-amber-500 transition-colors">
                            {{-- Instagram --}}
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7.75 2h8.5C19.55 2 22 4.45 22 7.75v8.5C22 19.55 19.55 22 16.25 22h-8.5C4.45 22 2 19.55 2 16.25v-8.5C2 4.45 4.45 2 7.75 2zm0 1.5C5.68 3.5 4 5.18 4 7.25v8.5c0 2.07 1.68 3.75 3.75 3.75h8.5c2.07 0 3.75-1.68 3.75-3.75v-8.5c0-2.07-1.68-3.75-3.75-3.75h-8.5zM12 7c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm4.75-3.25a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0z" />
                            </svg>
                        </a>

                        <a href="#" target="_blank" class="text-gray-400 hover:text-amber-500 transition-colors">
                            {{-- GitHub --}}
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12c0 4.42 2.87 8.17 6.84 9.49.5.09.66-.22.66-.49 0-.24-.01-.87-.01-1.7-2.78.6-3.37-1.34-3.37-1.34-.45-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.61.07-.61 1.01.07 1.55 1.04 1.55 1.04.89 1.53 2.34 1.09 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.56-1.11-4.56-4.94 0-1.09.39-1.98 1.03-2.67-.1-.25-.45-1.28.1-2.67 0 0 .84-.27 2.75 1.02A9.56 9.56 0 0112 6.8c.85.004 1.7.115 2.5.337 1.91-1.29 2.75-1.02 2.75-1.02.55 1.39.2 2.42.1 2.67.64.69 1.03 1.58 1.03 2.67 0 3.84-2.34 4.68-4.57 4.93.36.31.69.92.69 1.85 0 1.33-.012 2.4-.012 2.73 0 .27.16.59.67.49A10.02 10.02 0 0022 12c0-5.52-4.48-10-10-10z" />
                            </svg>
                        </a>
                    </div>

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
            <div
                class="flex flex-col md:flex-row justify-center md:justify-between items-center text-center md:text-left">
                <p class="text-gray-400 text-sm">© {{ date('Y') }} MetaBee. Todos os direitos reservados.</p>

                <div class="flex flex-wrap justify-center md:justify-end space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-amber-400 text-sm transition-colors">Política de
                        Privacidade</a>
                    <a href="#" class="text-gray-400 hover:text-amber-400 text-sm transition-colors">Termos de
                        Serviço</a>
                </div>
            </div>
        </div>
    </div>
</footer>
