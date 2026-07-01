<x-guest-layout>
    <style>
        :root {
            /* 
             * ==========================================
             * PALETA DE COLORES DINÁMICA (BRANDING)
             * ==========================================
             * Cambia este único valor HEX para adaptar toda 
             * la identidad visual del login a tu cliente.
             */
            --color-primary: #4F46E5;       /* Default: Indigo 600 */
            --color-primary-hover: #4338CA; /* Default: Indigo 700 */
            --color-primary-ring: rgba(79, 70, 229, 0.25);

            /* Ejemplos de otras paletas: */
            /* Azul Sistema Municipal:  --color-primary: #0ea5e9; --color-primary-hover: #0284c7; --color-primary-ring: rgba(14, 165, 233, 0.25); */
            /* Verde Corporativo:       --color-primary: #16a34a; --color-primary-hover: #15803d; --color-primary-ring: rgba(22, 163, 74, 0.25); */
            /* Oscuro Minimalista:      --color-primary: #0f172a; --color-primary-hover: #1e293b; --color-primary-ring: rgba(15, 23, 42, 0.25); */
        }
        
        /* Clases utilitarias enlazadas a las variables de color */
        .bg-primary { background-color: var(--color-primary); }
        .bg-primary-hover:hover { background-color: var(--color-primary-hover); }
        .text-primary { color: var(--color-primary); }
        .text-primary-hover:hover { color: var(--color-primary-hover); }
        .border-primary { border-color: var(--color-primary); }
        
        .focus-ring-primary:focus {
            --tw-ring-color: var(--color-primary-ring);
            border-color: var(--color-primary);
        }
        
        .checkbox-primary:checked {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }
        
        /* Gradiente moderno para el panel izquierdo */
        .bg-split-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
    </style>

    <div class="flex min-h-screen w-full bg-white selection:bg-[var(--color-primary)] selection:text-white">
        
        <!-- ========================================== -->
        <!-- PANEL IZQUIERDO: Branding y Mensaje (Oculto en Móvil) -->
        <!-- ========================================== -->
        <div class="hidden lg:flex lg:w-1/2 bg-split-gradient flex-col justify-between p-12 text-white relative overflow-hidden">
            <!-- Efectos decorativos de fondo (Glassmorphism / Blur) -->
            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-white opacity-5 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-[var(--color-primary)] opacity-20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10">
                <!-- ========================================== -->
                <!-- MARCADOR DE LOGOTIPO MODULAR               -->
                <!-- ========================================== -->
                <!-- Para usar el logo de la empresa, descomenta la etiqueta <img> y elimina el <div class="flex items-center..."> genérico -->
                <!-- <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-10 w-auto mb-8"> -->
                
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold tracking-tight text-white">SaaS<span class="font-light opacity-80">Flow</span></span>
                </div>
                
                <h1 class="text-4xl lg:text-5xl font-extrabold tracking-tight leading-[1.15] mt-16 mb-6">
                    Eleva tu <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-indigo-300 to-white">espacio de trabajo</span>
                </h1>
                <p class="text-lg text-slate-300 max-w-md font-light leading-relaxed">
                    Únete a los líderes de la industria que confían en nuestra plataforma para optimizar operaciones y escalar su negocio rápidamente.
                </p>
            </div>

            <div class="relative z-10 text-sm font-medium text-slate-400">
                &copy; {{ date('Y') }} SaaSFlow Inc. Todos los derechos reservados.
            </div>
        </div>

        <!-- ========================================== -->
        <!-- PANEL DERECHO: Formulario de Inicio de Sesión -->
        <!-- ========================================== -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 md:p-16">
            <div class="w-full max-w-md space-y-8">
                
                <!-- Encabezado Móvil (Logo y Título) -->
                <div class="text-center lg:text-left">
                    <div class="lg:hidden flex justify-center mb-6">
                        <!-- Marcador Logo Móvil -->
                        <!-- <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-12 w-auto"> -->
                        <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center shadow-lg shadow-[var(--color-primary-ring)]">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">Bienvenido de nuevo</h2>
                    <p class="mt-2 text-sm text-slate-500 font-medium">
                        Por favor, ingresa tus credenciales para acceder.
                    </p>
                </div>

                <!-- Alertas y Validaciones -->
                <x-validation-errors class="mb-4" />

                @session('status')
                    <div class="mb-4 font-medium text-sm text-emerald-600 bg-emerald-50 p-4 rounded-xl border border-emerald-100 flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        {{ $value }}
                    </div>
                @endsession

                <!-- Formulario -->
                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                    @csrf

                    <!-- Campo Correo Electrónico -->
                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-semibold text-slate-700">
                            {{ __('Email') }}
                        </label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="username" required autofocus value="{{ old('email') }}"
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus-ring-primary transition-all duration-300"
                                placeholder="tu@correo.com">
                        </div>
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-semibold text-slate-700">
                            {{ __('Password') }}
                        </label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus-ring-primary transition-all duration-300"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Recordarme y Contraseña Olvidada -->
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox"
                                class="h-4 w-4 rounded border-slate-300 text-primary checkbox-primary focus:ring-2 focus-ring-primary transition-all duration-300 cursor-pointer">
                            <label for="remember_me" class="ml-2 block text-sm font-medium text-slate-600 cursor-pointer">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}" class="font-semibold text-primary text-primary-hover transition-colors duration-300">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Botón Enviar -->
                    <div>
                        <button type="submit"
                            class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-primary bg-primary-hover focus:outline-none focus:ring-4 focus-ring-primary transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>

                <!-- Pie de Formulario: Registro -->
                @if (Route::has('register'))
                <div class="mt-8 pt-6 border-t border-slate-100">
                    <p class="text-center text-sm text-slate-500 font-medium">
                        ¿No tienes una cuenta?
                        <a href="{{ route('register') }}" class="font-bold text-primary text-primary-hover transition-colors duration-300 ml-1">
                            Crea una ahora
                        </a>
                    </p>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</x-guest-layout>
