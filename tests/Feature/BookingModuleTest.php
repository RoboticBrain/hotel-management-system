<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admins_can_view_all_bookings()
    {
        $this->withoutMiddleware();
        $admin = User::factory()->create(['isAdmin' => 1]);
        $this->actingAs($admin);
        Booking::factory()->count(3)->create();

        $response = $this->get(route('admin.show.bookings'));

        $response->assertStatus(200);
        $response->assertViewHas('bookings');
    }
}