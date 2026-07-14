<div class="flex flex-col h-full bg-slate-50 min-h-screen">
    
    <div class="flex items-end px-2 pt-2 bg-slate-200 border-b border-slate-300 overflow-x-auto custom-scrollbar">
        @foreach($tabs as $tab)
            <div 
                class="group flex items-center justify-between px-4 py-2 min-w-[150px] max-w-[200px] border-r border-slate-300 cursor-pointer select-none rounded-t-lg transition-colors {{ $activeTabId === $tab['id'] ? 'bg-white text-slate-900 shadow-[0_-2px_0_0_#4f46e5] z-10 relative font-semibold' : 'bg-slate-100 text-slate-500 hover:bg-slate-50' }}"
                wire:click="setActiveTab('{{ $tab['id'] }}')"
            >
                <div class="flex items-center gap-2 truncate">
                    <span class="text-sm truncate">{{ $tab['title'] }}</span>
                </div>

                @if(count($tabs) > 1)
                    <button 
                        wire:click.stop="closeTab('{{ $tab['id'] }}')" 
                        class="p-1 ml-2 rounded-md hover:bg-slate-200 hover:text-red-500 transition-colors {{ $activeTabId === $tab['id'] ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }}"
                        title="Cerrar pestaña"
                    >
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                @endif
            </div>
        @endforeach

        <button 
            wire:click="addEmptyTab" 
            class="p-2 ml-2 mb-1 rounded-md text-slate-500 hover:bg-slate-300 hover:text-slate-900 transition-colors"
            title="Abrir nuevo Panel de Control"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
        </button>
    </div>

    <div class="flex-1 relative bg-white overflow-hidden">
        @foreach($tabs as $tab)
            <div 
                class="absolute inset-0 overflow-y-auto"
                style="display: {{ $activeTabId === $tab['id'] ? 'block' : 'none' }};"
                wire:key="tab-content-{{ $tab['id'] }}"
            >
                @if($tab['is_dashboard'])
                    @livewire('dashboard-grid', key('grid-'.$tab['id']))
                @else
                    @livewire($tab['component'], key('module-'.$tab['id']))
                @endif
            </div>
        @endforeach
    </div>
    
</div>