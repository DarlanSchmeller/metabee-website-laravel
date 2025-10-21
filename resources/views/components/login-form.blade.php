<div class="relative w-screen min-h-screen flex flex-col lg:flex-row">
    {{-- Fullscreen Image --}}
    <div class="absolute inset-0">
        <img src="{{ asset('images/classroom.jpg') }}" alt="MetaBee Academy" class="w-full h-full object-cover"/>
        <div class="absolute inset-0 bg-gradient-to-r from-black/65 via-black/75 to-black/95"></div>
    </div>

    {{-- Left side content (desktop only) --}}
    <div class="hidden lg:flex flex-1 relative z-10 items-center justify-center p-12">
        <div class="flex flex-col gap-6 max-w-lg">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <x-logo />
                <span class="text-4xl font-bold drop-shadow-xl bg-gradient-to-r from-amber-400 via-yellow-400 to-amber-500 bg-clip-text text-transparent">MetaBee</span>
            </a>

            <h2 class="text-4xl md:text-4xl font-bold leading-tight text-white drop-shadow-xl">
                Aprenda robótica com os melhores instrutores
            </h2>
            <p class="text-gray-100 text-base md:text-xl drop-shadow-md mt-2">
                Mais de 500 alunos já transformaram suas carreiras com nossos cursos práticos e certificados reconhecidos.
            </p>

            {{-- Stats --}}
            <div class="flex flex-wrap gap-4 md:gap-8 pt-4">
                <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                    <div class="text-2xl md:text-3xl font-bold text-amber-400">500+</div>
                    <div class="text-xs md:text-sm text-gray-200">Alunos</div>
                </div>
                <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                    <div class="text-2xl md:text-3xl font-bold text-amber-400">120+</div>
                    <div class="text-xs md:text-sm text-gray-200">Cursos</div>
                </div>
                <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                    <div class="text-2xl md:text-3xl font-bold text-amber-400">98%</div>
                    <div class="text-xs md:text-sm text-gray-200">Satisfação</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Right side form --}}
    <div class="flex-1 relative z-20 flex items-center justify-center px-6 sm:px-8 md:px-12 py-12 lg:py-0">
        <div class="w-full max-w-lg flex flex-col justify-center gap-6">
            {{-- Mobile logo --}}
            <div class="mb-6 text-center lg:hidden">
                <a href="{{ route('home') }}" class="flex items-center justify-center space-x-2">
                    <x-logo class="w-10 h-10"/>
                    <h1 class="text-3xl font-bold drop-shadow-xl bg-gradient-to-r from-amber-400 via-yellow-400 to-amber-500 bg-clip-text text-transparent">MetaBee</h1>
                </a>
            </div>

            {{-- Welcome message --}}
            <div class="text-center mb-4 lg:mb-6">
                <h3 class="text-2xl md:text-3xl font-bold text-white drop-shadow-lg">Bem-vindo de volta!</h3>
                <p class="text-gray-300 text-sm md:text-base mt-1">Entre com suas credenciais para continuar</p>
            </div>

            {{-- Form container --}}
            <div class="relative bg-zinc-900/90 backdrop-blur-md border border-zinc-800 rounded-2xl p-6 md:p-10 shadow-lg">
                <form method="POST" action="{{ route('login') }}" class="space-y-5 md:space-y-6">
                    @csrf
                    {{-- Email --}}
                    <div class="space-y-2">
                        <label for="email" class="text-gray-200 text-sm md:text-base">E-mail</label>
                        <div class="relative">
                            <x-heroicon-o-envelope class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500"/>
                    <input id="email"  type="email" name="email" required autofocus placeholder="seu@email.com" value="{{ old('email') }}"
                            class="pl-10 bg-zinc-800/50 border outline-none border-zinc-700 text-white placeholder:text-gray-300 focus:border-amber-500 focus:ring-amber-500/20 focus:ring-1 rounded-lg w-full py-3 text-base md:text-lg transition" />
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="password" class="text-gray-200 text-sm md:text-base">Senha</label>
                            <a href="#" class="text-xs md:text-sm text-amber-400 hover:text-amber-300 transition-colors">Esqueceu a senha?</a>
                        </div>
                        <div class="relative">
                            <x-heroicon-o-lock-closed class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500"/>
                            <input id="password" type="password" name="password" required placeholder="••••••••"
                                   class="pl-10 pr-10 bg-zinc-800/50 border outline-none border-zinc-700 text-white placeholder:text-gray-300 focus:border-amber-500 focus:ring-amber-500/20 focus:ring-1 rounded-lg w-full py-3 text-base md:text-lg transition" />
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-yellow-500 text-zinc-900 font-semibold hover:from-amber-600 hover:to-yellow-600 hover:shadow-md hover:shadow-amber-500/20 transition-all duration-300 py-3 rounded-lg text-base md:text-lg">
                        Entrar
                    </button>

                    <div class="mt-4 text-center text-sm text-gray-300">
                        Ainda não tem uma conta? 
                        <a href="{{ route('create-account') }}" class="text-amber-400 hover:text-amber-300 font-medium">Crie agora</a>
                    </div>
                </form>
            </div>

            {{-- Mobile Stats --}}
            <div class="lg:hidden mt-6">
                <div class="flex flex-wrap justify-center gap-4 md:gap-8">
                    <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                        <div class="text-2xl md:text-3xl font-bold text-amber-400">500+</div>
                        <div class="text-xs md:text-sm text-gray-200">Alunos</div>
                    </div>
                    <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                        <div class="text-2xl md:text-3xl font-bold text-amber-400">120+</div>
                        <div class="text-xs md:text-sm text-gray-200">Cursos</div>
                    </div>
                    <div class="backdrop-blur-sm bg-zinc-900/50 rounded-lg p-3 text-center w-20 md:w-24">
                        <div class="text-2xl md:text-3xl font-bold text-amber-400">98%</div>
                        <div class="text-xs md:text-sm text-gray-200">Satisfação</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
