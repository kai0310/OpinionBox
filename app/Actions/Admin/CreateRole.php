<?php

namespace App\Actions\Admin;

use App\Contracts\Actions\Admin\CreateRoles;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class CreateRole implements CreateRoles
{
    public function create(array $input)
    {
        Validator::make($input, [
            'name'      => ['required', 'string', 'max:10'],
            'detail'    => ['max:30'],
        ])->validate();


        return Role::create([
            'name'      => $input['name'],
            'detail'    => $input['detail']
        ]);
    }
}
