<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Pet Grooming',
                'Veterinary Consultation',
                'Pet Training',
                'Boarding',
                'Daycare',
                'Medical Check-up',
                'Vaccination',
                'Dental Care',
                'Behavioral Counseling',
                'Emergency Care'
            ]),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 25, 250),
            'duration' => $this->faker->randomElement([30, 45, 60, 90, 120]),
            'is_featured' => $this->faker->boolean(30), // 30% chance of being featured
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
            'image' => 'default.jpg', // Set default image path
        ];
    }

    /**
     * Create a featured service
     */
    public function featured()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_featured' => true,
            ];
        });
    }

    /**
     * Create an inactive service
     */
    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => false,
            ];
        });
    }
}