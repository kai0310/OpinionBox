<?php

namespace App\Http\Livewire\Stuff;

use App\Actions\Admin\UpdatePostStatus;
use Livewire\Component;

class PermitButton extends Component
{

    public $post;

    protected $listeners = [
        'refresh-permit-button' => '$refresh',
    ];

    public function submit()
    {
        app(UpdatePostStatus::class)->update($this->post->id);
        $this->emit('refresh-permit-button');
    }

    public function render()
    {
        return view('livewire.stuff.permit-button');
    }
}
