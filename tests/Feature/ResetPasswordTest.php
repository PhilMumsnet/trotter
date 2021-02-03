<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\Passwords\PasswordBrokerManager;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_user_can_view_the_password_reset_page()
    {
        $user = User::factory()->create();
        $token = app(PasswordBrokerManager::class)->createToken($user);

        $response = $this->get(route('password.request'));

        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.email');
    }
}
