<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Admin\BanUser;
use App\Actions\Admin\ForceResetPassword;
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

    public function banUser(BanUser $banUser): void
    {
        try {
            $banUser->handle(Auth::user(), $this->targetUser);
        } catch (Exception $e) {
            $this->dialog()->error(
                __('操作が正常に実行されませんでした'),
                $e->getMessage()
            );
        } finally {
            $this->userEditModal = false;
        }

        $this->emit('refresh-admin-all-users-table');

        $this->dialog()->success(
            __(
                $this->targetUser->isBanned() ?
                ':0 さんのBanしました' : ':0 さんのBanを解除しました', [$this->targetUser->name]
            ),
        );
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
