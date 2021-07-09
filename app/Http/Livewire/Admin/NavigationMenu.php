<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class NavigationMenu extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.admin.navigation-menu');
    }
}
