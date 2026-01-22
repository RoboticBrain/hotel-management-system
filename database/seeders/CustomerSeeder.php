<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use App\Models\User;
class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        customer::factory()->create([
            "first_name"=> "Mazhar",
            "last_name"=> "Ahmed",
            "address" => "jabba tar khattak nowshera",
            "phone_number"=> "03069416043",
            "user_id" => User::factory()->create()->id,
        ]);
    }
}
