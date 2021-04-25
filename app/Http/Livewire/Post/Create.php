<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Actions\Post\CreatePost;

class Create extends Component
{
    public $title;
    public $content;

    public function submit()
    {
        $request = collect([
            'title' => $this->title,
            'content' => $this->content,
        ])->toArray();
        $id = app(CreatePost::class)->create($request);
        session()->flash('message', '意見が投稿されました');
        return redirect()->route('post.show', $id);
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
