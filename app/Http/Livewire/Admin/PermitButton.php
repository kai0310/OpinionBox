<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

class PermitButton extends Component
{
    public $post;


    public function submit()
    {
        Post::where('id', $this->post->id)
            ->update(['is_checked' => true]);
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.permit-button');
    }
}
