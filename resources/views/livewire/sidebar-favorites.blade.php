<div class="space-y-1.5">
    @foreach ($favoriteModules as $key => $module)
        <a href="{{ $module['route'] }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors border border-transparent group" title="{{ $module['name'] }}">
            <div class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-white transition-colors" :class="sidebarExpanded ? 'mr-3' : 'mx-auto'">
                {!! $module['icon'] !!}
            </div>
            <span class="truncate" x-show="sidebarExpanded" x-transition.opacity.duration.300ms>{{ $module['name'] }}</span>
        </a>
    @endforeach

    @if (empty($favoriteModules))
        <div class="px-3 py-4 text-xs text-center text-slate-500" x-show="sidebarExpanded" x-transition.opacity.duration.300ms>
            No tienes módulos favoritos aún. Usa la cuadrícula para agregar.
        </div>
        <div class="px-3 py-4 text-center text-slate-500" x-show="!sidebarExpanded" x-transition.opacity.duration.300ms title="Sin favoritos">
            <svg class="w-5 h-5 mx-auto opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
        </div>
    @endif
</div>
