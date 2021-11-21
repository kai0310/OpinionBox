<?php

namespace Database\State;

use Illuminate\Support\Facades\DB;


class EnsureRolesArePresent
{

    public function __invoke()
    {
        if ($this->present()) {
            return;
        }

        DB::table('roles')->insert(['name' => 'stuff']);

        DB::table('roles')->insert(['name' => 'developer']);
    }

    public function present()
    {

        return DB::table('roles')->count() > 0;

    }

}
