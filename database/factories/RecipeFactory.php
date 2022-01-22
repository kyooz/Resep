<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'body' => $this->faker->paragraph(mt_rand(5,10)),
            'user_id' => mt_rand(1,6),
            'category_id' => mt_rand(1,3)
        ];
    }
}