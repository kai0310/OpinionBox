<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Admin\UpdateRole;
use App\Models\Role;
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
        $this->state = $this->role;
    }

    public function update()
    {
        $input = collect(['name' => $this->name, 'detail' => $this->detail])->toArray();
        app(UpdateRole::class)->update($this->role, $input);
    }

    public function render()
    {
        return view('livewire.admin.edit-role-form');
    }
}
