<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class CustomerModuleTest extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_view_all_customers() {
        $admin = User::factory()->create(['isAdmin' => true]);
        $this->actingAs($admin);
        $response = $this->get(route('admin.show.customers'));
        $response->assertStatus(200);
    }
}