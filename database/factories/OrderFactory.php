<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' =>fake()->text(),
            'user_id' => 1,
            'customer' => fake()->name(),
            'paid' => false,
            'status' => 'new',
            'delivery' => true,
            'address' => fake()->address(),
            'delivery_price'=> fake()->randomFloat(),
            'delivery_date' => fake()->date(),
            'total' => fake()->randomFloat()
        ];
    }
}
