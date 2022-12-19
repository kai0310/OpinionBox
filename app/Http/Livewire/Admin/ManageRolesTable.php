<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use Livewire\Component;

class ManageRolesTable extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-admin-all-user-table' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.admin.manage-roles-table', [
            'roles' => Role::paginate(15),
        ]);
    }
}
