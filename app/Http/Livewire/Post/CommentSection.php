<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Actions\Post\CreateComment;

class CommentSection extends Component
{
    public $post;
    public $body;

    public function submit()
    {
        $request = collect(['body' => $this->body, 'postId' => $this->post->id])->toArray();
        app(CreateComment::class)->create($request);
        session()->flash('message', 'メッセージを送信中です');
        $this->resetValidation();
        $this->body = '';
    }

    public function render()
    {
        return view('livewire.post.comment-section')->with(
            'comments', $this->post->comments()
            ->latest()->get()
        );
    }
}
