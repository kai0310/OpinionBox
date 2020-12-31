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
        'title'     => 'required|string|min:10|max:20',
        'content'   => 'required|string|min:20|max:200',
    ];

    public function submit()
    {
        $this->validate();

        Post::create([
            'user_id'   => Auth::id(),
            'title'     => $this->title,
            'content'   => $this->content,
        ]);

        session()->flash('message', '意見の投稿が完了しました');
        $this->title = '';
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
