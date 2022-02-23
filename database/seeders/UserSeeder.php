<?php

namespace Database\Seeders;

use App\Models\Post;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('opinion-box.initial.user.do_create')) {
            $user = User::factory()
                ->create([
                    'name' => config('opinion-box.initial.user.name'),
                    'email' => config('opinion-box.initial.user.email'),
                    'password' => bcrypt(config('opinion-box.initial.user.password')),
                    'is_admin' => true,
                    'bio' => 'Hey! I\'m OpinionBox official account',
                    'profile_photo_path' => 'https://unavatar.io/kai0310'
                ]);

            $user->roles()->attach([1, 2]);
        }

        if (! App::environment('production')) {
            User::factory(100)->has(
                Post::factory()->count(2)
            )->create();
        }
    }
}
