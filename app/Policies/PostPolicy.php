<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Post $post
     * @return bool|Response
     */
    public function view(User $user, Post $post): bool|Response
    {
        if ($user->isStuff()) {
            return true;
        }

        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny(__('This post is not visible'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Post $post
     * @return Response|bool
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->id;
    }

    public function approve(User $user, Post $post)
    {
        if (!$user->isStuff()) {
            return false;
        }

        return $user->id === $post->id
            ? Response::deny(__('You can\'t approve own posts'))
            : Response::allow();

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Post $post
     * @return Response|bool
     */
    public function delete(User $user, Post $post)
    {
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Post $post
     * @return Response|bool
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Post $post
     * @return Response|bool
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
