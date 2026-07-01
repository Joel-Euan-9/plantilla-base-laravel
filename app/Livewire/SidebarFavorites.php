<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Traits\HasAppModules;
use Illuminate\Support\Facades\Auth;

class SidebarFavorites extends Component
{
    use HasAppModules;

    public array $favorites = [];

    public function mount()
    {
        $this->loadFavorites();
    }

    #[On('favorites-updated')]
    public function loadFavorites()
    {
        $user = Auth::user();
        $this->favorites = $user->favorited_modules ?? [];
    }

    public function render()
    {
        $allModules = $this->app_modules;
        $favoriteModules = [];

        foreach ($this->favorites as $key) {
            if (isset($allModules[$key])) {
                $favoriteModules[$key] = $allModules[$key];
            }
        }

        return view('livewire.sidebar-favorites', [
            'favoriteModules' => $favoriteModules,
        ]);
    }
}
