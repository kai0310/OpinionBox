<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Admin\DeleteRole;
use Livewire\Component;

class DeleteRoleButton extends Component
{
    public $role;

    /**
     * Indicates if user deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingRoleDeletion = false;

    public function confirmingRoleDeletion(): void
    {
        $this->dispatchBrowserEvent('confirming-delete-role');
        $this->confirmingRoleDeletion = true;
    }

    /**
     * Delete Role
     */
    public function deleteRole(): void
    {
        app(DeleteRole::class)->delete($this->role);
        $this->emit('refresh-admin-all-user-table');
        $this->confirmingRoleDeletion = false;
        $this->alert('success', 'ロールが削除されました', [
            'position' =>  'top-end',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.delete-role-button');
    }
}
