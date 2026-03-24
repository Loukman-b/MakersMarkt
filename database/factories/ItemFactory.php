<?php

namespace Database\Factories;

use App\Models\ItemType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'item_type_id' => ItemType::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 0, 99999999.99),
            'material' => fake()->word(),
            'production_time' => fake()->numberBetween(-10000, 10000),
        ];
    }
}
