<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Tests\TestCase;

class AuthTest extends TestCase
{
    
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_login_with_correct_credentials(): void
    {
    
        $user = User::factory()->create([
            'email' => 'elonmusk@gmail.com',
            'password' => bcrypt('password'),
            'isAdmin' => 1,
        ]);
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);
    
    }
 
}
