<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\BrowserKitTestCase;

uses(BrowserKitTestCase::class);
uses(RefreshDatabase::class);

test('users cannot create a post when not logged in', function () {
    $this->visit('post/create')->seePageIs('login');
});

test('users can create an article', function () {
    $this->login();

    \Livewire\Livewire::test(App\Http\Livewire\Post\Create::class)
        ->set('title', 'Make school rules explicit.')
        ->set('content',
            'Many students don\'t understand what school rules are in.so, we would like to make the school rules explicit.'
        )
        ->call('submit')
        ->assertRedirect('post/1');
});

test('other user cannot read unapproved post', function () {
    $this->login();

    \App\Models\User::factory()
        ->has(\App\Models\Post::factory())
        ->create();

    $this->get('post/1')->assertForbidden();
});

test('general users cannot see the allow button', function () {
    $this->login();

    \Livewire\Livewire::test(App\Http\Livewire\Post\Create::class)
        ->set('title', 'Make school rules explicit.')
        ->set('content', 'Because many students don\'t understand what school rules are in.')
        ->call('submit');

    $this->visit('post/1')->dontSee(__('公開する'));
});

test('stuff users can see the allow button', function () {
    $admin = $this->loginAsAdmin();

    $this->assertTrue($admin->isStuff());

    \Livewire\Livewire::test(App\Http\Livewire\Post\Create::class)
        ->set('title', 'Make school rules explicit.')
        ->set('content', 'Because many students don\'t understand what school rules are in.')
        ->call('submit');

    $this->visit('post/1')->see(__('公開する'));

    \App\Models\Post::first()->update(['approved_at' => now()]);

    $this->visit('post/1')->see(__('非公開にする'));
});

test('author can delete my post', function () {
    $user = $this->login();
    \App\Models\Post::factory()->create(['user_id' => $user->id]);

    $post = \App\Models\Post::get()->first();

    $this->get('post/1')->see(__('削除する'));

    Livewire\Livewire::test(\App\Http\Livewire\Post\DeletePostButton::class, ['post' => $post])
        ->call('deletePost');

    $this->assertEquals(0, \App\Models\Post::all()->count());
});

test('no one except the author can delete a post', function () {
    \App\Models\User::factory()->has(
        \App\Models\Post::factory()->approved()
    )->create();

    $this->login();
    $this->get('post/1')->dontSee(__('削除する'));

    Livewire\Livewire::test(\App\Http\Livewire\Post\DeletePostButton::class, [
        'post' => \App\Models\Post::query()->first(),
    ])->call('deletePost');

    $this->assertEquals(1, \App\Models\Post::all()->count());
});
