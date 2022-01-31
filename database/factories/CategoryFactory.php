<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word;

        return [
            'name' => $name,
            'slug' => \Str::slug($name),
            'order' => $this->faker->numberBetween(1, 100),
            'color' => $this->faker->hexColor,
            'icon' => $this->faker->imageUrl(64, 64),
            'active' => $this->faker->boolean,
            'featured_image' => "https://picsum.photos/1200/800?random=".rand(1, 99),
            'user_id' => \App\Models\User::where('user_type_id', 1)->inRandomOrder()->first()->id,
        ];

    }
}
