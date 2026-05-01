<?php

namespace Database\Factories;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement([
                'Weekend Special',
                'Early Bird Discount',
                'Luxury Upgrade Deal',
                'Holiday Promotion',
            ]),
            'description' => $this->faker->randomElement([
                'Get 20% off on your next car rental!',
                'Rent a car for 3 days and get the 4th day free!',
                'Enjoy a weekend getaway with our special promotion: Rent for 2 days, get the 3rd day free!',
                'Limited time offer: Get 15% off on all car rentals this month!',
                'Book now and receive a free GPS rental with your car!',
            ]),
            'image' => null,
        ];
    }
}
