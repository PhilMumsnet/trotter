<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Like;
use App\Models\User;
use App\Models\Trott;
use Livewire\Livewire;
use App\Http\Livewire\TrottSummary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikeTrottTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_user_can_like_a_trott()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Trott::factory()->create([
            'user_id' => Auth::id(),
        ]);

        $trott = Trott::with('user')->first();

        Livewire::test(TrottSummary::class)
            ->actingAs($user)
            ->set('trott', $trott)
            ->call('like')
        ;

        $this->assertTrue(
            1 === Like::where('user_id', $user->id)
                ->where('trott_id', $trott->id)
                ->count()
        );
    }
}
