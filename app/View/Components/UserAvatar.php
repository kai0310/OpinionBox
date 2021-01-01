<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserAvatar extends Component
{

    public $user;

    /**
     * Create a new component instance.
     *
     * @param User $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<div>
    <img
        src="{{ $user->profile_photo_url }}"
        alt="{{ $user->name }}さんのプロフィール"
        class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block
        @if($user->is_admin) border border-yellow-400 @endif"
    />
</div>
blade;
    }
}
