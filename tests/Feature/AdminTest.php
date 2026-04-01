<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
class AdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_non_admins_cannot_access_admin_routes(): void
    {
        $user = User::factory()->create([
            'email' => 'info@gmail.com',
            'password' => bcrypt('password'),   
            'isAdmin' => 0,
        ]);
        $this->actingAs($user);
        $response = $this->get(route('admin.show.bookings'));
        $response->assertStatus(403);
    }

}
