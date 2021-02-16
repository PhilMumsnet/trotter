<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\Passwords\PasswordBrokerManager;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_user_can_view_the_password_reset_request_page()
    {
        $response = $this->get(route('password.request'));

        $response->assertViewIs('auth.passwords.email');
    }

    /** @test */
    public function the_user_is_sent_an_email_to_reset_their_password()
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->actingAs($user)->post(route('password.email'), [
            'email' => $user->email,
        ]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    /** @test */
    public function the_user_is_not_sent_an_email_to_reset_their_password_if_they_provide_an_invalid_email()
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->actingAs(User::factory()->create())->post(route('password.email'), [
            'email' => 'invalid@email.com',
        ]);

        Notification::assertNothingSent();
    }

    /** @test */
    public function the_user_can_view_the_password_reset()
    {
        $user = User::factory()->create();
        $token = app(PasswordBrokerManager::class)->createToken($user);

        $response = $this->get(route('password.reset', [
            'token' => $token,
        ]));

        $response->assertViewIs('auth.passwords.reset');
    }

    /** @test */
    public function the_user_can_reset_their_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('1abcdefgh!A'),
        ]);

        $token = app(PasswordBrokerManager::class)->createToken($user);

        $response = $this->post(route('password.update', [
            'token' => $token,
            'email' => $user->email,
            'password' => '2abcdefgh!A',
            'password_confirmation' => '2abcdefgh!A',
        ]));

        $user->refresh();

        $this->assertTrue(Hash::check('2abcdefgh!A', $user->password));
    }

    /** @test */
    public function the_user_cannot_reset_their_password_with_the_wrong_email()
    {
        $user = User::factory()->create([
            'password' => bcrypt('1abcdefgh!A'),
        ]);

        $token = app(PasswordBrokerManager::class)->createToken($user);

        $this->post(route('password.update', [
            'token' => $token,
            'email' => 'wrong@email.com',
            'password' => '2abcdefgh!A',
            'password_confirmation' => '2abcdefgh!A',
        ]));

        $user->refresh();

        $this->assertFalse(Hash::check('2abcdefgh!A', $user->password));
    }

    /** test */
    public function the_user_cannot_reset_their_password_with_an_invalid_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('1abcdefgh!A'),
        ]);

        $token = app(PasswordBrokerManager::class)->createToken($user);

        $this->post(route('password.update', [
            'token' => $token,
            'email' => $user->email,
            'password' => 'abc',
            'password_confirmation' => 'abc',
        ]));

        $user->refresh();

        $this->assertFalse(Hash::check('abc', $user->password));
    }
}
