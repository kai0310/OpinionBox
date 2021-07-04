<?php

namespace App\Actions\Profile;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Actions\Profile\UpdateBios;
use App\Models\Comment;


class UpdateBio implements UpdateBios
{
    public function update(array $request)
    {
        Validator::make($request, [
            'bio' => ['string', 'max:160', ],
        ])->validate();


        Auth::user()->update([
            'bio' => $request['bio'],
        ]);

    }
}
