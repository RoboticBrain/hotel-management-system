<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Room;
use Tests\TestCase;

class RoomModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_admins_can_create_rooms(): void
    {
      $this->withoutMiddleware();
      $admin = User::factory()->create([
        'isAdmin' => 1,
      ]);
      $this->actingAs($admin);

      $roomData = [
        'room_number' => '101',
        'room_type' => 'Single',
        'status' => 'available',
        'price' => '100.00',
      ];

      $response = $this->post(route('admin.store.room'), $roomData);

      $response->assertStatus(302);
      $this->assertDatabaseHas('rooms', $roomData);
    }

   

    
}
