<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_name' => $this->faker->word(),
            'item_desc' => $this->faker->paragraph(6),
            'price' => $this->faker->numberBetween(100000, 1000000),
        ];
    }
}
