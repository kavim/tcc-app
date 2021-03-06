<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'slug' => \Str::slug($title),
            'subtitle' => $this->faker->words(3, true),
            'body' => $this->faker->paragraphs(10, true),
            'description' => $this->faker->paragraph,
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'user_id' => \App\Models\User::where('user_type_id', 1)->inRandomOrder()->first()->id,
            'active' => $this->faker->boolean,
            'published_at' => $this->faker->datetime,
            'order' => $this->faker->numberBetween(1, 100),
            'featured_image' => "https://picsum.photos/1200/800?random=".rand(1, 99),
        ];
    }
}
