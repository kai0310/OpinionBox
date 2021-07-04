<?php

namespace App\Http\Livewire\Profile;

use App\Actions\Profile\UpdateBio;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateBioForm extends Component
{
    public $bio = '';
    public $state = [];

    public function mount()
    {
        $this->bio = Auth::user()->bio;
    }

    public function updateBio()
    {
        $request = collect(['bio' => $this->bio])->toArray();
        app(UpdateBio::class)->update($request);
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.profile.update-bio-form');
    }
}
