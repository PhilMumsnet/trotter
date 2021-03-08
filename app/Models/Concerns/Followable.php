<?php

namespace App\Models\Concerns;

use App\Models\User;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function isFollowerOf(User $user)
    {
        return $this->follows->contains($user);
    }

    public function toggleFollowStatus(User $user)
    {
        $this->isFollowerOf($user)
            ? $this->unfollow($user)
            : $this->follow($user)
        ;
    }
}
