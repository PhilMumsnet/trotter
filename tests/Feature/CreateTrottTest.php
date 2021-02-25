<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Trott;
use Livewire\Livewire;
use App\Http\Livewire\NewTrottForm;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTrottTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_user_can_create_a_trott()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(NewTrottForm::class)
            ->set('trottBody', 'This is a test trott')
            ->call('submit')
        ;

        $this->assertTrue(1 === Trott::where('body', 'This is a test trott')->count());
    }
}
