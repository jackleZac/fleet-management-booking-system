<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;
use App\Models\Review;
use App\Models\Promotion;
use App\Models\Faq;
use App\Models\ContactInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create one admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'phone_number' => '0123456789',
            'password' => Hash::make('abc123'),
            'role' => 'admin',
        ]);

        // create a user (customer)
        User::create([
            'name' => 'Customer1',
            'email' => 'customer1@test.com',
            'phone_number' => '0124444444',
            'password' => Hash::make('123'),
            'role' => 'customer',            
        ]);

        // create 5 random users
        $users = User::factory()->count(5)->create();

        // create cars
        $cars = Car::factory()->count(8)->create([
            'is_featured' => true,
        ]);

        // create reviews
        Review::factory()->count(10)->create([
            'user_id' => $users->random()->id,
            'car_id' => $cars->random()->id,
        ]);

        // create promotions
        Promotion::factory()->count(6)->create();

        // create FAQs
        Faq::factory()->count(5)->create();

        // create contact info
        ContactInfo::create([
            'address' => '123 Main St, Anytown, USA',
            'phone' => '555-123-4567',
            'email' => 'company@example.com'
        ]);
    }
}
