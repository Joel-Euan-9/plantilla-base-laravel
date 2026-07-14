<?php

namespace App\Livewire;

use Livewire\Component;

class WindowManager extends Component
{
    public $tabs = [];

    public $activeTabId = null;

    protected $listeners = ['open-module' => 'openModule'];

    public function mount()
    {
        $this->addDashboardTab();
    }

    public function addDashboardTab()
    {
        $id = uniquid('tab_');
        $this->tabs[] = [
            'id' => $id,
            'title' => 'Panel de Control',
            'icon' => 'squares-2x2',
            'component' => 'dashboard-grid',
            'is_dashboard' => true,
        ];

        $this->activeTabId = $id;
    }

    public function addEmptyTab()
    {
        $this->addDashboardTab();
    }

    public function openModule($moduleName, $componentName)
    {
        $index = array_search($this->activeTabId, array_column($this->tabs, 'id'));

        if ($index !== false){
            $this->tabs[$index]['title'] = $moduleName;
            $this->tabs[$index]['component'] = $componentName;
            $this->tabs[$index]['is_dashboard'] = false;
        }
    }

    public function closeTab($tabId)
    {
        if(count($this->tabs) <= 1){
            return;
        }

        $index = array_search($tabId, array_column($this->tabs, 'id'));

        if ($index !== false) {
            unset($this->tabs[$index]);
            $this->tabs = array_values($this->tabs);

            if ($this->activeTabId === $tabId){
                $this->activeTabId = end($this->tabs)['id'];
            }
        }
    }

    public function setActiveTab($tabId)
    {
        $this->activeTabId = $tabId;
    }

    public function reorderTabs($orderedIds)
    {
        $newTabs = [];
        foreach($orderedIds as $id) {
            $index = array_search($id, array_column($this->tabs, 'id'));
            if($index !== false){
                $newTabs[] = $this->tabs[$index];
            }
        }
        $this->tabs = $newTabs;
    }


    public function render()
    {
        return view('livewire.window-manager');
    }
}
