<?php

namespace App\Models\Concerns;

use App\Models\Like;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

trait Likable
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($user = null, bool $liked = true)
    {
        return $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : Auth::id(),
        ], [
            'liked' => $liked,
        ]);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user, bool $liked = true)
    {
        return (bool) $user::query()
            ->likes()
            ->where('tweet_id', $this->id)
            ->where('liked', $liked)
            ->count()
        ;
    }

    public function isDisikedBy(User $user)
    {
        return $this->isLikedBy($user, false);
    }
}
