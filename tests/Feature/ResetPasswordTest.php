<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
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

    /** @test */
    public function the_user_is_sent_an_email_to_reset_their_password()
    {
        Notification::fake();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('password.email'), [
            'email' => $user->email,
        ]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    /** @test */
    public function the_user_is_not_sent_an_email_to_reset_their_password_if_they_provide_an_invalid_email()
    {
        Notification::fake();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('password.email'), [
            'email' => 'invalid@email.com',
        ]);

        Notification::assertNothingSent();
    }
}
