<?php

namespace App\Livewire;

use Livewire\Component;
use App\Traits\HasAppModules;
use Illuminate\Support\Facades\Auth;

class DashboardGrid extends Component
{
    use HasAppModules;

    public array $favorites = [];

    public function mount()
    {
        $this->favorites = Auth::user()->favorited_modules ?? [];
    }

    public function toggleFavorite($moduleKey)
    {
        $user = Auth::user();
        $favorites = $user->favorited_modules ?? [];

        if (in_array($moduleKey, $favorites)) {
            $favorites = array_diff($favorites, [$moduleKey]);
        } else {
            $favorites[] = $moduleKey;
        }

        $favorites = array_values($favorites); // reindex
        
        $user->favorited_modules = $favorites;
        $user->save();

        $this->favorites = $favorites;

        // Disparar evento para que el Sidebar se actualice (Livewire 3)
        $this->dispatch('favorites-updated');
    }

    public function render()
    {
        return view('livewire.dashboard-grid', [
            'modules' => $this->app_modules,
        ]);
    }
}
