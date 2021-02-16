<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Trott;
use Livewire\Livewire;
use App\Http\Livewire\Timeline;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrottTimelineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_timeline_displays_the_trotts()
    {
        $user = User::factory()->create();
        $this->actingAs(($user));

        Trott::factory()->create([
            'user_id' => $user->id,
            'body' => 'trott body',
        ]);

        Livewire::test(Timeline::class)
            ->assertSeeLivewire('trott-summary')
            ->assertSee('trott body')
        ;
    }
}
