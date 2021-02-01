<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $user = User::factory()->create();

        $this->assertTrue(true);
    }
}
