<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Admin\UpdateRole;
use Livewire\Component;

class EditRoleForm extends Component
{
    public $formModal;

    public $role;

    public $name;

    public $detail;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->state = $this->role->toArray();
    }

    public function update()
    {
        app(UpdateRole::class)->update($this->role, $this->state);
        $this->formModal = false;
        $this->emit('refresh-admin-all-user-table');
    }

    public function render()
    {
        return view('livewire.admin.edit-role-form');
    }
}
