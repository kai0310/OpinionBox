<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Admin\ForceResetPassword;
use App\Exceptions\LackOfPermissionException;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class UserEditModal extends Component
{
    use Actions;

    public User $targetUser;

    public bool $userEditModal = false;

    public function mount(User $targetUser): void
    {
        $this->targetUser = $targetUser;
    }

    public function editUser(): void
    {
    }

    /**
     * @param ForceResetPassword $forceResetPassword
     * @return void
     */
    public function resetPassword(ForceResetPassword $forceResetPassword): void
    {
        try {
            $reset_password = $forceResetPassword->handle(Auth::user(), $this->targetUser);
        } catch (Exception $e) {
            $this->dialog()->error(
                __('パスワードを初期化できませんでした'),
                $e->getMessage()
            );
            return;
        } finally {
            $this->userEditModal = false;
        }

        $this->dialog()->success(
            __('パスワードを初期化しました'),
            __('新しいパスワードは :0 です', [$reset_password['new_password']])
        );
    }


    public function render(): View
    {
        return view('livewire.admin.user-edit-modal');
    }
}
