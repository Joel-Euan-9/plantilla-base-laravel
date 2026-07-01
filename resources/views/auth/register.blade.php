<x-guest-layout>
    <style>
        :root {
            /* 
             * ==========================================
             * PALETA DE COLORES DINÁMICA (BRANDING)
             * ==========================================
             * Cambia este único valor HEX para adaptar toda 
             * la identidad visual de autenticación a tu cliente.
             */
            --color-primary: #4F46E5;       /* Default: Indigo 600 */
            --color-primary-hover: #4338CA; /* Default: Indigo 700 */
            --color-primary-ring: rgba(79, 70, 229, 0.25);
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
                    Comienza a <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-indigo-300 to-white">construir el futuro</span>
                </h1>
                <p class="text-lg text-slate-300 max-w-md font-light leading-relaxed">
                    Crea tu cuenta en segundos y únete a los profesionales que ya están transformando su manera de trabajar.
                </p>
            </div>

            <div class="relative z-10 text-sm font-medium text-slate-400">
                &copy; {{ date('Y') }} SaaSFlow Inc. Todos los derechos reservados.
            </div>
        </div>

        <!-- ========================================== -->
        <!-- PANEL DERECHO: Formulario de Registro -->
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
                    <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">Crea tu cuenta</h2>
                    <p class="mt-2 text-sm text-slate-500 font-medium">
                        Completa tus datos para empezar de inmediato.
                    </p>
                </div>

                <!-- Alertas y Validaciones -->
                <x-validation-errors class="mb-4" />

                <!-- Formulario -->
                <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
                    @csrf

                    <!-- Campo Nombre -->
                    <div class="space-y-1">
                        <label for="name" class="block text-sm font-semibold text-slate-700">
                            {{ __('Name') }}
                        </label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" autocomplete="name" required autofocus value="{{ old('name') }}"
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus-ring-primary transition-all duration-300"
                                placeholder="Tu nombre completo">
                        </div>
                    </div>

                    <!-- Campo Correo Electrónico -->
                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-semibold text-slate-700">
                            {{ __('Email') }}
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="username" required value="{{ old('email') }}"
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus-ring-primary transition-all duration-300"
                                placeholder="tu@correo.com">
                        </div>
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-semibold text-slate-700">
                            {{ __('Password') }}
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="new-password" required
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus-ring-primary transition-all duration-300"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Campo Confirmar Contraseña -->
                    <div class="space-y-1">
                        <label for="password_confirmation" class="block text-sm font-semibold text-slate-700">
                            {{ __('Confirm Password') }}
                        </label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                                class="appearance-none block w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus-ring-primary transition-all duration-300"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Términos y Condiciones (Jetstream) -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="terms" name="terms" type="checkbox" required
                                        class="h-4 w-4 rounded border-slate-300 text-primary checkbox-primary focus:ring-2 focus-ring-primary transition-all duration-300 cursor-pointer">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="font-medium text-slate-600 cursor-pointer">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="font-semibold text-primary text-primary-hover transition-colors duration-300">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="font-semibold text-primary text-primary-hover transition-colors duration-300">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Botón Enviar -->
                    <div class="pt-2">
                        <button type="submit"
                            class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-primary bg-primary-hover focus:outline-none focus:ring-4 focus-ring-primary transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>

                <!-- Pie de Formulario: Ya tienes cuenta -->
                <div class="mt-8 pt-6 border-t border-slate-100">
                    <p class="text-center text-sm text-slate-500 font-medium">
                        ¿Ya tienes una cuenta?
                        <a href="{{ route('login') }}" class="font-bold text-primary text-primary-hover transition-colors duration-300 ml-1">
                            Inicia sesión aquí
                        </a>
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</x-guest-layout>
