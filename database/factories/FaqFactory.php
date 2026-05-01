<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => $this->faker->randomElement([
                'What documents do I need to rent a car?',
                'Can I rent a car if I am under 25?',
                'Is there a mileage limit on rentals?',
                'What is your cancellation policy?',
                'Do you offer roadside assistance?'
            ]),
            'answer' => $this->faker->randomElement([
                'You will need a valid driver’s license, a credit card, and proof of insurance.',
                'Yes, but there may be an additional fee for drivers under 25.',
                'Most rentals come with unlimited mileage, but it’s best to check the specific terms of your rental agreement.',
                'You can cancel your reservation up to 24 hours before the pickup time for a full refund.',
                'Yes, we offer 24/7 roadside assistance for all our rentals.'
            ]),
        ];
    }
}
