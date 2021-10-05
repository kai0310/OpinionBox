<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AllUsersTable extends Component
{
    use WithPagination;
    public $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.all-users-table', [
            'users' => User::where('name', 'like', '%'.$this->search.'%')
                ->orwhere('email', 'like', '%'.$this->search.'%')
                ->paginate(30),
        ]);
    }
}
