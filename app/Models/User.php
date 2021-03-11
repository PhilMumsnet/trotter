<?php

namespace App\Models;

use App\Models\Concerns\Followable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

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

    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'user_id', 'following_user_id');
    }

    public function timeline()
    {
        return Trott::query()
            ->whereIn(
                'user_id',
                $this->follows
                    ->pluck('id')
                    ->push($this->id)
            )
            ->with('user')
            ->withLikes()
            ->latest()
            ->get()
        ;
    }
}
