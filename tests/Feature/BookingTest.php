<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_guest_cannot_access_booking_page(): void
    {
        $response = $this->get(route('admin.show.bookings'));
        $response->assertRedirect('/login');
    
    }
}
