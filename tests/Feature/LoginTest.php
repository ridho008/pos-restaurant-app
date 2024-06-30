<?php

namespace Tests\Feature;

use App\Livewire\Auth\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_validate_field_email_and_password_login()
    {
        // $this->actingAs(User::factory()->create());
        Livewire::test(Login::class)
         ->set('email', '')
         ->set('password', '')
        ->call('login')
        ->assertHasErrors(['email'=> 'required', 'password' => 'required']);
    }
}
