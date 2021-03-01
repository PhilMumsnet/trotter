<?php

namespace App\Models;

use App\Models\Concerns\Likable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trott extends Model
{
    use HasFactory, Likable;

    protected $fillable = [
        'body',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
