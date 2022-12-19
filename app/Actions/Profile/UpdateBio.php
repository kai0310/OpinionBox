<?php

namespace App\Actions\Profile;

use App\Contracts\Actions\Profile\UpdateBios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UpdateBio implements UpdateBios
{
    public function update(array $request)
    {
        Validator::make($request, [
            'bio' => ['string', 'max:160'],
        ])->validate();

        Auth::user()->update([
            'bio' => $request['bio'],
        ]);
    }
}
