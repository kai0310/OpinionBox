<?php

namespace App\Http\Livewire\Stuff;

use App\Actions\Admin\UpdatePostStatus;
use Livewire\Component;

class PermitButton extends Component
{
    public $post;

    public function approve(): void
    {
        app(UpdatePostStatus::class)->approve($this->post);
        session()->flash('message', 'Post successfully updated.');

    }

    public function undoApprove(): void
    {
        app(UpdatePostStatus::class)->undoApprove($this->post);
    }


    public function render()
    {
        return view('livewire.stuff.permit-button');
    }
}
