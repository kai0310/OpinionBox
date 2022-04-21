<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Admin\ForceResetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class UserEditModal extends Component
{
    use Actions;

    public User $targetUser;

    public bool $cardModal = false;

    public function mount(User $targetUser): void
    {
        $this->targetUser = $targetUser;
    }

    public function editUser()
    {
    }

    public function resetPassword(ForceResetPassword $forceResetPassword): void
    {
        $new_password = $forceResetPassword->handle(Auth::user(), $this->targetUser)['new_password'];

        $this->cardModal = false;

        $this->dialog()->success(
            __('パスワードを初期化しました'),
            __('新しいパスワードは :0 です', [$new_password])
        );
    }


    public function render(): View
    {
        return view('livewire.admin.user-edit-modal');
    }
}
