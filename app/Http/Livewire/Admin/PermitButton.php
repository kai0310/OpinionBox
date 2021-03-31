<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Actions\Admin\UpdatePostStatus;

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
        return view('livewire.admin.permit-button');
    }
}
