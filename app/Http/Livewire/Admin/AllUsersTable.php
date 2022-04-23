<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class AllUsersTable extends Component
{
    use WithPagination;

    public string $search = '';

    protected $listeners = [
        'refresh-admin-all-users-table' => '$refresh'
    ];

    public function getUsers(): LengthAwarePaginator
    {
        return User::query()->where('name', 'like', '%'.$this->search.'%')
            ->orwhere('email', 'like', '%'.$this->search.'%')
            ->paginate(30);
    }

    public function render()
    {
        return view('livewire.admin.all-users-table', [
            'users' => $this->getUsers(),
        ]);
    }
}
