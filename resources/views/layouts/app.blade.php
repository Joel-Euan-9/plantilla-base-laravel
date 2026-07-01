<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased text-slate-900 overflow-hidden">
        <x-banner />

        <!-- Envoltorio Principal ERP (H-Screen, Flex) con Estado Alpine para Sidebar -->
        <div x-data="{ sidebarOpen: false, sidebarExpanded: true }" class="h-screen flex bg-slate-50 overflow-hidden w-full relative">
            
            <!-- Sidebar Navigation (Delegado a Livewire) -->
            @livewire('navigation-menu')

            <!-- Main Workspace -->
            <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
                
                <!-- ========================================== -->
                <!-- SISTEMA DE VENTANAS (TOP TAB BAR)          -->
                <!-- ========================================== -->
                <header class="bg-slate-100/70 border-b border-slate-200 flex items-end px-2 pt-2 gap-1.5 h-14 relative z-10 w-full">
                    
                    <!-- Botón Hamburguesa Móvil (Abre el Sidebar) -->
                    <button @click="sidebarOpen = true" class="md:hidden flex items-center justify-center w-9 h-9 mb-1 rounded-lg text-slate-500 hover:bg-slate-200 hover:text-slate-900 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>

                    <!-- Pestaña Falsa Inactiva (Ejemplo Visual) -->
                    <div class="hidden sm:flex items-center bg-slate-200/50 text-slate-500 hover:bg-slate-200 text-sm font-medium px-4 py-2 rounded-t-lg border-t border-l border-r border-transparent cursor-pointer transition-colors max-w-[200px] flex-shrink-0 group">
                        <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                        <span class="truncate">Archivos</span>
                        <div class="ml-3 p-0.5 rounded-md text-transparent group-hover:text-slate-400 hover:!bg-slate-300 hover:!text-slate-700">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </div>
                    </div>

                    <!-- Pestaña Activa (Fusionada con el fondo bg-slate-50 del Main) -->
                    <div class="flex items-center bg-slate-50 text-slate-800 text-sm font-semibold px-4 py-2 rounded-t-lg border-t border-l border-r border-slate-200 cursor-default relative max-w-[200px] flex-shrink-0 z-20">
                        <!-- Pseudo-elemento para ocultar el borde inferior y fusionar con el lienzo -->
                        <div class="absolute -bottom-[1px] left-0 right-0 h-px bg-slate-50"></div>
                        <svg class="w-4 h-4 mr-2 text-[var(--color-primary,indigo)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        <span class="truncate">Panel de Control</span>
                        <div class="ml-3 p-0.5 rounded-md text-slate-400 hover:bg-slate-200 hover:text-slate-700 cursor-pointer transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </div>
                    </div>

                    <!-- Botón "+" -->
                    <button class="flex items-center justify-center w-8 h-8 mb-1 rounded-lg text-slate-400 hover:bg-slate-200 hover:text-slate-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </button>

                    <!-- Espaciador Flexible -->
                    <div class="flex-1"></div>

                    <!-- ========================================== -->
                    <!-- ÁREA DE PERFIL Y NOTIFICACIONES            -->
                    <!-- ========================================== -->
                    <div class="flex items-center mb-1.5 px-3 space-x-3 border-l border-slate-200">
                        
                        <!-- Notificaciones (Simulación) -->
                        <button class="relative text-slate-400 hover:text-slate-600 transition-colors p-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                            <span class="absolute top-0 right-0 flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500 border border-white"></span>
                            </span>
                        </button>

                        <!-- Teams Dropdown Migrado -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="relative">
                                <x-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-2 py-1.5 border border-transparent text-sm font-medium rounded-md text-slate-500 hover:text-slate-700 bg-transparent hover:bg-slate-200 focus:outline-none transition ease-in-out duration-150">
                                                {{ Auth::user()->currentTeam->name ?? 'Mi Equipo' }}
                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" /></svg>
                                            </button>
                                        </span>
                                    </x-slot>
                                    <x-slot name="content">
                                        <div class="w-60">
                                            <div class="block px-4 py-2 text-xs text-slate-400">{{ __('Manage Team') }}</div>
                                            <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id ?? 1) }}">{{ __('Team Settings') }}</x-dropdown-link>
                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-dropdown-link href="{{ route('teams.create') }}">{{ __('Create New Team') }}</x-dropdown-link>
                                            @endcan
                                            @if (Auth::user()->allTeams()->count() > 1)
                                                <div class="border-t border-slate-200"></div>
                                                <div class="block px-4 py-2 text-xs text-slate-400">{{ __('Switch Teams') }}</div>
                                                @foreach (Auth::user()->allTeams() as $team)
                                                    <x-switchable-team :team="$team" />
                                                @endforeach
                                            @endif
                                        </div>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @endif

                        <!-- Perfil Dropdown Migrado -->
                        <div class="relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-slate-300 transition hover:opacity-80">
                                            <img class="h-8 w-8 rounded-full object-cover shadow-sm" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-2 py-1.5 border border-transparent text-sm font-medium rounded-md text-slate-500 hover:text-slate-700 bg-transparent hover:bg-slate-200 focus:outline-none transition ease-in-out duration-150">
                                                {{ Auth::user()->name ?? 'Admin' }}
                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>
                                <x-slot name="content">
                                    <div class="block px-4 py-2 text-xs text-slate-400">{{ __('Manage Account') }}</div>
                                    <x-dropdown-link href="{{ route('profile.show') }}">{{ __('Profile') }}</x-dropdown-link>
                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-dropdown-link href="{{ route('api-tokens.index') }}">{{ __('API Tokens') }}</x-dropdown-link>
                                    @endif
                                    <div class="border-t border-slate-200"></div>
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">{{ __('Log Out') }}</x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </header>

                <!-- Page Content Canvas -->
                <!-- Eliminamos la antigua inserción de $header (ya no es necesaria visualmente, o se puede ocultar) -->
                <main class="flex-1 overflow-y-auto bg-slate-50 relative w-full h-full">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
