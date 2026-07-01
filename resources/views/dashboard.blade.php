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

            <!-- Arquitectura Bento Box / Grid Asimétrico -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4 sm:px-0">
                
                <!-- Módulo 1 (1 Columna): Gestión de Usuarios -->
                <a href="#" class="group relative block bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] hover:border-indigo-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] transition-all duration-300 transform hover:-translate-y-1 overflow-hidden h-full">
                    
                    <!-- Premium Badge (Translúcido) -->
                    <div class="absolute top-4 right-4 bg-red-50/80 backdrop-blur-sm text-red-600 text-[11px] font-bold px-2.5 py-1 rounded-full border border-red-100 shadow-sm flex items-center z-10">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Solo Admin
                    </div>

                    <div class="p-6 flex flex-col h-full">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-50 to-blue-50 border border-indigo-100/50 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Usuarios & Roles</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6 flex-grow">
                            Administra jerarquías, accesos y permisos estructurales.
                        </p>
                        
                        <div class="flex items-center text-sm font-semibold text-indigo-600 group-hover:text-indigo-700 transition-colors">
                            Configurar
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                    </div>
                </a>

                <!-- Módulo 2 (2 Columnas - Bento Box Principal): Atención Ciudadana -->
                <a href="#" class="group relative block bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] hover:border-blue-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] transition-all duration-300 transform hover:-translate-y-1 overflow-hidden h-full md:col-span-2">
                    
                    <div class="absolute inset-0 bg-gradient-to-br from-transparent to-slate-50/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                    <div class="p-6 md:p-8 flex flex-col h-full relative z-10">
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-50 to-cyan-50 border border-blue-100/50 flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            </div>
                            
                            <!-- Notification pill -->
                            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1.5 rounded-full">12 Tickets Activos</span>
                        </div>
                        
                        <h3 class="text-xl md:text-2xl font-bold text-slate-900 mb-3 tracking-tight">Centro de Atención</h3>
                        <p class="text-base text-slate-500 leading-relaxed max-w-md mb-8 flex-grow">
                            Bandeja unificada. Responde y clasifica automáticamente solicitudes, quejas y peticiones entrantes.
                        </p>
                        
                        <div class="flex items-center text-sm font-semibold text-blue-600 group-hover:text-blue-700 transition-colors">
                            Ir a Bandeja de Entrada
                            <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                    </div>
                </a>

                <!-- Módulo 3 (1 Columna): Reportes -->
                <a href="#" class="group relative block bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] hover:border-violet-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] transition-all duration-300 transform hover:-translate-y-1 overflow-hidden h-full">
                    <div class="p-6 flex flex-col h-full">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-violet-50 to-purple-50 border border-violet-100/50 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                            <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Analítica Viva</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6 flex-grow">
                            Métricas operativas y exportación avanzada de KPIs.
                        </p>
                        
                        <div class="flex items-center text-sm font-semibold text-violet-600 group-hover:text-violet-700 transition-colors">
                            Abrir Dashboard
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                    </div>
                </a>

                <!-- Módulo 4 (2 Columnas - Bento Secundario): Apariencia Web CMS -->
                <a href="#" class="group relative block bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] hover:border-emerald-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] transition-all duration-300 transform hover:-translate-y-1 overflow-hidden h-full md:col-span-2">
                    <div class="absolute inset-0 bg-gradient-to-br from-transparent to-slate-50/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                    <div class="p-6 md:p-8 flex flex-col h-full relative z-10">
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-emerald-50 to-teal-50 border border-emerald-100/50 flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                            </div>
                        </div>
                        
                        <h3 class="text-xl md:text-2xl font-bold text-slate-900 mb-3 tracking-tight">Portal Web (CMS)</h3>
                        <p class="text-base text-slate-500 leading-relaxed max-w-md mb-8 flex-grow">
                            Orquesta el portal público. Publica artículos, edita la estructura de navegación y ajusta el sistema de diseño visual.
                        </p>
                        
                        <div class="flex items-center text-sm font-semibold text-emerald-600 group-hover:text-emerald-700 transition-colors">
                            Personalizar Sitio
                            <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                    </div>
                </a>

                <!-- Módulo 5 (1 Columna): Trámites y Archivos -->
                <a href="#" class="group relative block bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] hover:border-orange-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] transition-all duration-300 transform hover:-translate-y-1 overflow-hidden h-full">
                    <div class="p-6 flex flex-col h-full">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-orange-50 to-amber-50 border border-orange-100/50 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 group-hover:-rotate-3 transition-transform duration-300">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Gestor Documental</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6 flex-grow">
                            Trámites, firmas digitales y expedientes online centralizados.
                        </p>
                        <div class="flex items-center text-sm font-semibold text-orange-600 group-hover:text-orange-700 transition-colors">
                            Manejar Archivos
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                    </div>
                </a>

                <!-- Módulo 6 (1 Columna): Configuración del Sistema -->
                <a href="#" class="group relative block bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] hover:border-slate-400 hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] transition-all duration-300 transform hover:-translate-y-1 overflow-hidden h-full">
                    <div class="p-6 flex flex-col h-full">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-slate-100 to-gray-50 border border-slate-200/50 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">Ajustes Globales</h3>
                        <p class="text-sm text-slate-500 leading-relaxed mb-6 flex-grow">
                            Preferencias de entorno, respaldos automáticos e integraciones API.
                        </p>
                        <div class="flex items-center text-sm font-semibold text-slate-700 group-hover:text-slate-900 transition-colors">
                            Configurar Entorno
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
