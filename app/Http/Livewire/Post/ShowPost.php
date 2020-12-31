<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Auth;
use App\Models\Comment;

class ShowPost extends Component
{
    public $post;
    public $body;

    protected $rules = [
        'body' => 'required|string|max:200',
    ];


    public function submit()
    {
        $this->validate();
        Comment::create([
            'body'      => $this->body,
            'user_id'   => Auth::id(),
            'post_id'   => $this->post->id,
        ]);
        session()->flash('message', '投稿が完了しました');
        $this->body = '';
    }

    public function render()
    {
        return view('livewire.post.show-post')->with(
            'post', $this->post::find($this->post->id)->with('comments.user')->first()
        );
    }
}
