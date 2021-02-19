<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

class PermitButton extends Component
{
    public $post;

    protected $listeners = [
        'refresh-permit-button' => '$refresh',
    ];

    public function submit()
    {
        Post::withoutGlobalScope('is_checked')->whereId($this->post->id)
            ->update([
                'is_checked' => true,
            ]);
        $this->emit('refresh-permit-button');
    }

    public function render()
    {
        return view('livewire.admin.permit-button');
    }
}
