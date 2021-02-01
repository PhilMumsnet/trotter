<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_user_can_view_the_login_page()
    {
        $response = $this->get(route('login'));

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function the_user_cannot_view_the_login_page_when_logged_in()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('login'));

        $response->assertRedirect(route('home'));
    }

    /** @test */
    public function the_user_can_log_in()
    {
        $user = User::factory()->create([
            'email' => 'here@there.com',
        ]);

        $response = $this->post(route('login'), [
            'email' => 'here@there.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function the_user_cannot_log_in_with_an_invalid_email()
    {
        $user = User::factory()->create([
            'email' => 'here@there.com',
        ]);

        $response = $this->post(route('login'), [
            'email' => 'bad@email.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    /** @test */
    public function the_user_cannot_log_in_with_an_invalid_password()
    {
        $user = User::factory()->create([
            'email' => 'here@there.com',
        ]);

        $response = $this->post(route('login'), [
            'email' => 'here@there.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }
}
