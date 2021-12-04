<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;
use App\Actions\Post\CreateComment;

class CommentSection extends Component
{
    /** @var Post */
    public $post;

    /** @var string */
    public $body;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->post->comments = $this->post->comments()->latest()->get();
    }

    public function submit(): void
    {
        $request = collect(['body' => $this->body, 'postId' => $this->post->id])->toArray();
        $comment = app(CreateComment::class)->create($request);
        $this->resetValidation();
        $this->reset('body');
        $this->post->comments->push($comment);
    }

    public function render(): View
    {
        return view('livewire.post.comment-section');
    }
}
