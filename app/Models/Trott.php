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

    public function bodyWithUserTags()
    {
        return preg_replace_callback(
            '/@[a-zA-Z]+/',
            function ($matches) {
                if (User::where('username', ltrim($matches[0], '@'))->exists()) {
                    return sprintf(
                        '<a class="underline" href="%s">%s</a>',
                        route('profile', ltrim($matches[0], '@')),
                        $matches[0]
                    );
                }

                return  $matches[0];
            },
            $this->body
        );
    }
}
