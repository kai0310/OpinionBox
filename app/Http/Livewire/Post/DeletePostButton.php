<?php

namespace App\Http\Livewire\Post;

use App\Actions\Post\DeletePost;
use App\Exceptions\CannotDeletePostException;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class DeletePostButton extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @param DeletePost $deletePost
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function deletePost(DeletePost $deletePost)
    {
        try {
            $deletePost->handle($this->post);

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
