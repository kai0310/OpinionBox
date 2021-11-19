<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Admin\CreateRole;
use App\Models\Role;
use Livewire\Component;

class CreateRolesForm extends Component
{
    public $formModal = false;
    public $name;
    public $detail;

    public function create(): void
    {
        $input = collect(['name' => $this->name, 'detail' => $this->detail])->toArray();

        app(CreateRole::class)->create($input);
        $this->emit('refresh-admin-all-user-table');
        $this->refresh();
        $this->alert('success', 'ロールが追加されました', [
            'position' =>  'top-end',
        ]);
    }

    public function refresh(): void
    {
        $this->formModal = false;
        $this->name = '';
        $this->detail = '';
    }

    public function render()
    {
        return view('livewire.admin.create-roles-form');
    }
}
