<?php

namespace App\Http\Livewire\Post;

use App\Actions\Post\DeletePost;
use App\Exceptions\CannotDeletePostException;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class DeletePostButton extends Component
{
    use Actions;

    public Post $post;

    public bool $confirmingApiTokenDeletion = false;

    public function mount(Post $post): void
    {
        $this->post = $post;
    }

    public function confirmation(): void
    {
        $this->dialog()->confirm([
            'icon'       => 'error',
            'title'       => '意見を本当に削除しますか？',
            'description' => '一度消してしまうと、この操作は取り消せません。',
            'acceptLabel' => '削除する',
            'method'      => 'deletePost',
            'params'      => 'Saved',
            'rejectLabel' => '削除しない',
        ]);
    }

    /**
     * @param DeletePost $deletePost
     * @return RedirectResponse
     */
    public function deletePost(DeletePost $deletePost)
    {
        try {
            $deletePost->handle($this->post, Auth::user());
        } catch (CannotDeletePostException $e) {
            session()->flash('flash.bannerStyle', 'danger');
            session()->flash('flash.banner', $e->getMessage());

            return redirect()->to(url()->previous());
        }
        session()->flash('flash.banner', __('投稿を削除しました'));

        return redirect()->route('post.me');
    }

    public function render(): View
    {
        return view('livewire.post.delete-post-button');
    }
}
