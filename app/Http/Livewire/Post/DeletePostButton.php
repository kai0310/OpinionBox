<?php

namespace App\Http\Livewire\Post;

use App\Actions\Post\DeletePost;
use App\Exceptions\CannotDeletePostException;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class DeletePostButton extends Component
{
    public Post $post;

    protected DeletePost $deletePost;

    public function mount(Post $post, DeletePost $deletePost): void
    {
        $this->post = $post;
        $this->deletePost = $deletePost;
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
