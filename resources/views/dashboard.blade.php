<x-app-layout>
    <style>
        /* CSS Variables de Branding */
        :root {
            --color-primary: #4F46E5;
            --color-primary-hover: #4338CA;
        }

        /* Patrón de puntos muy sutil para dar profundidad arquitectónica al fondo */
        .bg-dots {
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Destello (glow) radial en la parte superior para estética moderna */
        .bg-glow {
            background: radial-gradient(circle at 50% 0%, rgba(79, 70, 229, 0.05), transparent 60%);
        }
    </style>

    <x-slot name="header">
        <div class="flex items-center">
            <!-- ========================================== -->
            <!-- LOGOTIPO DEL CLIENTE                       -->
            <!-- ========================================== -->
            <!-- Descomenta la siguiente etiqueta <img> para incluir el logo de la empresa -->
            <!-- <img src="{{ asset('images/logo-cliente.png') }}" class="h-10 w-auto mr-4" alt="Logo"> -->
            
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Panel de Control') }}
            </h2>
        </div>
    </x-slot>

    <!-- Lienzo Principal del Dashboard -->
    <div class="relative py-12 bg-slate-50 min-h-screen overflow-hidden">
        
        <!-- Elementos decorativos de fondo -->
        <div class="absolute inset-0 bg-dots opacity-40 pointer-events-none"></div>
        <div class="absolute inset-0 bg-glow pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Hero Header Interno con Métricas -->
            <div class="mb-10 flex flex-col lg:flex-row lg:items-end justify-between gap-6 px-4 sm:px-0">
                <div>
                    <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">Bienvenido, {{ Auth::user()->name ?? 'Administrador' }}</h3>
                    <p class="mt-2 text-base text-slate-500 font-medium leading-relaxed">
                        Panel de control unificado. ¿Qué vamos a construir hoy?
                    </p>
                </div>
                
                <!-- Quick Metrics / Estatus Falso -->
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-center bg-white border border-slate-200/80 px-4 py-2.5 rounded-xl shadow-sm">
                        <span class="flex w-2.5 h-2.5 bg-emerald-500 rounded-full mr-3 animate-pulse"></span>
                        <span class="text-sm font-semibold text-slate-700">Estado del Sistema: <span class="text-emerald-600">Óptimo</span></span>
                    </div>
                    <div class="hidden sm:flex items-center bg-white border border-slate-200/80 px-4 py-2.5 rounded-xl shadow-sm">
                        <svg class="w-4 h-4 text-slate-400 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-sm font-semibold text-slate-700">Sincronizado hace 5 min</span>
                    </div>
                </div>
            </div>

            <!-- Lanzador de Aplicaciones (Odoo Style) delegando a Livewire -->
            <livewire:dashboard-grid />

        </div>
        </div>
    </div>
</x-app-layout>
