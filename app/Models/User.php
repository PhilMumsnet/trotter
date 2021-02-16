<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
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

    public function timeline()
    {
        return Trott::query()
            ->where('user_id', $this->id)
            ->with('user')
            ->latest()
            ->get()
        ;
    }
}
