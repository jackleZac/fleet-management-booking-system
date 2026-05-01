<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cars = [
            [
                'make' => 'Perodua',
                'model' => 'Axia',
                'price_min' => 80,
                'price_max' => 120,
                'seats' => 5,
                'is_featured' => true,
            ],
            [
                'make' => 'Proton',
                'model' => 'Bezza',
                'price_min' => 90,
                'price_max' => 140,
                'seats' => 5,
                'is_featured' => false,
            ],
            [
                'make' => 'Toyota',
                'model' => 'Vios',
                'price_min' => 120,
                'price_max' => 190,
                'seats' => 5,
                'is_featured' => false,
            ],
            [
                'make' => 'Honda',
                'model' => 'Civic',
                'price_min' => 180,
                'price_max' => 260,
                'seats' => 5,
                'is_featured' => true,
            ],
            [
                'make' => 'Mazda',
                'model' => 'CX-5',
                'price_min' => 220,
                'price_max' => 320,
                'seats' => 5,
                'is_featured' => false,
            ],
            [
                'make' => 'BMW',
                'model' => '320i',
                'price_min' => 350,
                'price_max' => 550,
                'seats' => 5,
                'is_featured' => false,
            ],
            [
                'make' => 'Mercedes-Benz',
                'model' => 'C200',
                'price_min' => 380,
                'price_max' => 600,
                'seats' => 5,
                'is_featured' => true,
            ],
            [
                'make' => 'Audi',
                'model' => 'A8 L',
                'price_min' => 450,
                'price_max' => 680,
                'seats' => 5,
                'is_featured' => true,
            ],
        ];

        $car = $this->faker->randomElement($cars);

        return [
            'model' => $car['model'],
            'make' => $car['make'],
            'price_per_day' => $this->faker->numberBetween($car['price_min'], $car['price_max']),
            'transmission' => $this->faker->randomElement(['Auto', 'Manual']),
            'seats' => $car['seats'],
            'fuel' => $this->faker->randomElement(['Petrol', 'Diesel']),
            'is_featured' => $car['is_featured'],
            'status' => 'available',
        ];
    }
}
