<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCannotLoginIfIsAuthenticated(): void
    {
        $user = User::factory([
            "email" => "test@example.com",
            "password" => Hash::make("password"),
        ])->create();

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

        $this->get("/")
            ->assertRedirect("/dashboard");
    }

    public function testUserCanLoginWithProperCredentials(): void
    {
        $user = User::factory([
            "email" => "test@example.com",
            "password" => Hash::make("password"),
        ])->create();

        $this->assertGuest();

        $this->post("/login", [
            "email" => "test@example.com",
            "password" => "password",
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertAuthenticatedAs($user);
    }

    public function testUserCannotLoginWithWrongCredentials(): void
    {
        User::factory([
            "email" => "test@example.com",
            "password" => Hash::make("password"),
        ])->create();

        $this->assertGuest();

        $this->post("/login", [
            "email" => "test@example.com",
            "password" => "wrong-password",
        ])
            ->assertSessionHasErrors("email")
            ->assertRedirect();

        $this->assertGuest();
    }
}
