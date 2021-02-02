<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_user_can_view_the_registration_page()
    {
        $response = $this->get(route('register'));

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    /** @test */
    public function the_user_cannot_view_the_registration_page_when_logged_in()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('register'));

        $response->assertRedirect(route('home'));
    }

    /** @test */
    public function the_user_can_register()
    {
        $response = $this->post(route('register'), [
            'name' => 'Mr Wibble',
            'email' => 'here@there.com',
            'password' => '2Asecretpassword!',
            'password_confirmation' => '2Asecretpassword!',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('home'));
    }

    /** @test */
    public function the_user_cannot_register_with_invalid_details()
    {
        $response = $this->post(route('register'), [
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
        $response->assertRedirect('/');
    }

    /** @test */
    public function the_user_cannot_register_with_a_duplicate_email()
    {
        $user = User::factory()->create(['email' => 'here@there.com']);

        $response = $this->post(route('register'), [
            'name' => 'Mr Wibble',
            'email' => 'here@there.com',
            'password' => 'asecretpassword',
            'password_confirmation' => 'asecretpassword',
        ]);

        $response->assertSessionHasErrors(['email']);
        $response->assertRedirect('/');
    }
}
