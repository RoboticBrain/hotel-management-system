<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use App\Models\User;
class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        customer::factory(5)->create();
    }
}
