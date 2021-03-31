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
    public $counts;

    public function like()
    {
        app(CreateLikePost::class)->create($this->post->id);
        $this->counts++;
    }

    public function cancel()
    {
        app(DeleteLikePost::class)->delete($this->post->id);
        $this->counts--;
    }

    public function render()
    {
        return view('livewire.post.like-button', [
            'like' => $this->post->likes()->where('user_id', Auth::id())->first(),
        ]);
    }
}
