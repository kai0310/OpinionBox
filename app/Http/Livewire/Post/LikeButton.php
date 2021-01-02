<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Like;
use Auth;

class LikeButton extends Component
{
    public $post;
    public $counts;

    public function like()
    {
        Like::create([
            'post_id'  => $this->post->id,
            'user_id' => Auth::id(),
        ]);
        $this->counts++;
    }

    public function cancel()
    {
         Like::where('user_id', Auth::id())->delete();
         $this->counts--;
    }

    public function render()
    {
        return view('livewire.post.like-button', [
            'like' => $this->post->likes()->where('user_id', Auth::id())->first(),
        ]);
    }
}
