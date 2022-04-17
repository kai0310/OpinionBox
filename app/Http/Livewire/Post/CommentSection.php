<?php

namespace App\Http\Livewire\Post;

use App\Models\Comment;
use App\Models\Post;
use App\Traits\WireUiActions;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use App\Actions\Post\CreateComment;

class CommentSection extends Component
{
    use WireUiActions;

    /** @var Post */
    public Post $post;

    /** @var string */
    public string $body = '';

    public ?int $deleteTargetCommentId = null;

    public function mount(Post $post): void
    {
        $this->post = $post;
        $this->post->comments = $this->post->comments()->oldest()->get();
    }

    public function submit(): void
    {
        $request = collect([
            'body' => $this->body, 'postId' => $this->post->id
        ])->toArray();

        $comment = app(CreateComment::class)->create($request);

        $this->resetValidation();
        $this->reset('body');

        $this->post->comments->push($comment);
    }

    public function confirmingCommentDeletion($comment): void
    {
        $this->deleteTargetCommentId = $comment;

        $this->dialog()->confirm([
            'icon'        => 'error',
            'title'       => __('コメントを本当に削除しますか？'),
            'description' => __('投稿されたコメントは議論に必要なかもしれません'),
            'acceptLabel' => '削除する',
            'method'      => 'deleteComment',
            'rejectLabel' => '削除しない',
        ]);
    }

    public function deleteComment(): void
    {
        $comment = Comment::find($this->deleteTargetCommentId);
        if (is_null($comment)) {
            return;
        }

        if (! $comment->user()->is(Auth::user())) {
            return;
        }

        unset($this->post->comments[$comment->id]);
        Comment::find($this->deleteTargetCommentId)->delete();
    }

    public function render(): View
    {
        return view('livewire.post.comment-section');
    }
}
