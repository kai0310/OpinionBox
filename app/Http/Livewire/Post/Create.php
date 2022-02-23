<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Actions\Post\CreatePost;

class Create extends Component
{
    public ?string $title = null;
    public ?string $content = null;

    public function submit()
    {
        $request = collect([
            'title' => $this->title,
            'content' => $this->content,
        ])->toArray();

        $post = app(CreatePost::class)->create($request);

        session()->flash('message', __('posts.created'));
        return redirect()->route('post.show', $post);
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
