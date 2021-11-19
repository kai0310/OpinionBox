<?php

namespace App\Http\Livewire\Post;

use App\Actions\Post\CreateLikePost;
use App\Actions\Post\DeleteLikePost;
use Livewire\Component;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeButton extends Component
{
    public $post;
    public $counts = 0;

    public function mount(): void
    {
        $this->counts = count($this->post->likes);
    }

    public function like(): void
    {
        app(CreateLikePost::class)->create($this->post);
        $this->counts++;
    }

    public function cancel()
    {
        app(DeleteLikePost::class)->delete($this->post);
        $this->counts--;
    }

    public function render()
    {
        return view('livewire.post.like-button', [
            'like' => $this->post->likes()->where('user_id', Auth::id())->first(),
        ]);
    }
}
