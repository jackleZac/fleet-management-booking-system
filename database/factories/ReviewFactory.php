<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->randomElement([
                'Great car and excellent service!',
                'The car was clean and well-maintained.',
                'Had a wonderful experience, will rent again!',
                'The rental process was smooth and hassle-free.',
                'Highly recommend this car rental service!',
            ]),
        ];
    }
}
