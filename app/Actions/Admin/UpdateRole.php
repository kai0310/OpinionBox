<?php

namespace App\Actions\Admin;

use App\Contracts\Actions\Admin\UpdateRoles;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class UpdateRole implements UpdateRoles
{
    public function update(Role $role, array $input)
    {
        Validator::make($input, [
            'name'      => ['required', 'string', 'max:10'],
            'detail'    => ['max:30'],
        ])->validate();


        return $role->update([
            'name'      => $input['name'],
            'detail'    => $input['detail']
        ]);
    }
}
