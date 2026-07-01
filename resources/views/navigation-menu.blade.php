<div>
    <!-- Sidebar Navigation (Odoo/Linear Style) -->
    <aside class="flex-shrink-0 bg-slate-900 text-slate-300 flex flex-col transition-all duration-300 absolute md:relative z-40 h-full transform md:translate-x-0 shadow-xl md:shadow-none"
           :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen, 'w-64': sidebarExpanded, 'w-20': !sidebarExpanded}">
        
        <!-- Branding / Logo Area -->
        <div class="h-14 flex items-center px-4 bg-slate-950/50 border-b border-slate-800 justify-between">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group overflow-hidden" :class="sidebarExpanded ? 'w-auto' : 'mx-auto'">
                <div class="w-8 h-8 rounded-lg bg-indigo-500 flex items-center justify-center text-white shadow-sm group-hover:scale-105 group-hover:bg-indigo-400 transition-all flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="font-bold text-lg text-white tracking-tight truncate" x-show="sidebarExpanded" x-transition.opacity.duration.300ms>{{ config('app.name', 'ERP System') }}</span>
            </a>
            
            <!-- Toggle Sidebar Button (Desktop) -->
            <button @click="sidebarExpanded = !sidebarExpanded" class="hidden md:flex text-slate-400 hover:text-white transition-colors" x-show="sidebarExpanded">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path></svg>
            </button>
            
            <!-- Close button for mobile -->
            <button @click="sidebarOpen = false" class="md:hidden text-slate-400 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 overflow-y-auto py-6 space-y-1.5" :class="sidebarExpanded ? 'px-3' : 'px-2'">
            
            <!-- Toggle Sidebar Button (when collapsed) -->
            <div class="hidden md:flex justify-center mb-4" x-show="!sidebarExpanded">
                <button @click="sidebarExpanded = true" class="text-slate-400 hover:text-white transition-colors p-2 rounded-lg hover:bg-slate-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
                </button>
            </div>

            <!-- Dashboard Link -->
            <a href="{{ route('dashboard') }}" class="flex items-center py-2.5 text-sm font-medium rounded-lg transition-all group {{ request()->routeIs('dashboard') ? 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white border border-transparent' }}" :class="sidebarExpanded ? 'px-3' : 'justify-center'" title="Panel de Control">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('dashboard') ? 'text-indigo-400' : 'text-slate-400' }} group-hover:text-white transition-colors" :class="sidebarExpanded ? 'mr-3' : 'mx-auto'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="truncate" x-show="sidebarExpanded" x-transition.opacity.duration.300ms>Panel de Control</span>
            </a>

            <!-- Separator -->
            <div class="my-6 border-t border-slate-800 mx-2"></div>
            <div class="mb-2 text-xs font-bold text-slate-500 uppercase tracking-wider" :class="sidebarExpanded ? 'px-3 text-left' : 'text-center'">
                <span x-show="sidebarExpanded">Favoritos</span>
                <span x-show="!sidebarExpanded">Fav</span>
            </div>

            <!-- Módulos Favoritos (Livewire) -->
            <livewire:sidebar-favorites />

            <!-- Separator -->
            <div class="my-6 border-t border-slate-800 mx-2"></div>
            <div class="mb-2 text-xs font-bold text-slate-500 uppercase tracking-wider" :class="sidebarExpanded ? 'px-3 text-left' : 'text-center'">
                <span x-show="sidebarExpanded">Sistema</span>
                <span x-show="!sidebarExpanded">Sys</span>
            </div>

            <!-- Perfil -->
            <a href="{{ route('profile.show') }}" class="flex items-center py-2.5 text-sm font-medium rounded-lg transition-all group {{ request()->routeIs('profile.show') ? 'bg-indigo-500/10 text-indigo-400 border border-indigo-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white border border-transparent' }}" :class="sidebarExpanded ? 'px-3' : 'justify-center'" title="Mi Perfil">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('profile.show') ? 'text-indigo-400' : 'text-slate-400' }} group-hover:text-white transition-colors" :class="sidebarExpanded ? 'mr-3' : 'mx-auto'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span class="truncate" x-show="sidebarExpanded" x-transition.opacity.duration.300ms>Mi Perfil</span>
            </a>

            <!-- Configuración Global -->
            <a href="#" class="flex items-center py-2.5 text-sm font-medium rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors border border-transparent group" :class="sidebarExpanded ? 'px-3' : 'justify-center'" title="Configuración Global">
                <svg class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-white transition-colors" :class="sidebarExpanded ? 'mr-3' : 'mx-auto'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="truncate" x-show="sidebarExpanded" x-transition.opacity.duration.300ms>Configuración Global</span>
            </a>
        </nav>
        
        <!-- User summary at bottom of Sidebar -->
        <div class="p-4 bg-slate-950/50 border-t border-slate-800">
            <div class="flex items-center gap-3" :class="sidebarExpanded ? 'justify-start' : 'justify-center'">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="h-9 w-9 rounded-full object-cover border border-slate-700 shadow-sm flex-shrink-0" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                @else
                    <div class="h-9 w-9 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-300 font-bold shadow-sm flex-shrink-0">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                @endif
                <div class="flex flex-col min-w-0" x-show="sidebarExpanded" x-transition.opacity.duration.300ms>
                    <span class="text-sm font-semibold text-white truncate">{{ Auth::user()->name ?? 'Administrador' }}</span>
                    <span class="text-xs text-slate-400 truncate">{{ Auth::user()->email ?? 'admin@sistema.local' }}</span>
                </div>
            </div>
        </div>
    </aside>

    <!-- Mobile Overlay (Off-canvas logic) -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-30 md:hidden" 
         @click="sidebarOpen = false" 
         style="display: none;">
    </div>
</div>
