<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use Auth;

class Create extends Component
{
    public $title;
    public $content;

    protected $rules = [
        'title'     => 'required|string|min:5|max:30',
        'content'   => 'required|string|min:20|max:500',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $post = Post::create([
            'user_id'   => Auth::id(),
            'title'     => $this->title,
            'content'   => $this->content,
        ]);
        session()->flash('message', '意見が投稿されました');
        return redirect()->route('post.show', $post->id);
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
