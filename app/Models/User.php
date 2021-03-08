<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function trotts()
    {
        return $this->hasMany(Trott::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function timeline()
    {
        return Trott::query()
            ->where('user_id', $this->id)
            ->with('user')
            ->withLikes()
            ->latest()
            ->get()
        ;
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follow(self $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(self $user)
    {
        return $this->follows()->detach($user);
    }

    public function isFollowerOf(self $user)
    {
        return $this->follows->contains($user);
    }

    public function toggleFollowStatus(self $user)
    {
        $this->isFollowerOf($user)
            ? $this->unfollow($user)
            : $this->follow($user)
        ;
    }
}
