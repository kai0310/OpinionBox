<?php


namespace App\Actions\Post;


use App\Contracts\Actions\Post\DeleteLikePosts;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class DeleteLikePost implements DeleteLikePosts
{
    public function delete(int $id)
    {
        Like::where('user_id', Auth::id())->delete();
    }
}
