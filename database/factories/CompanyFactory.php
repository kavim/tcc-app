<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name();

        return [
            'name' => $name,
            'slug' => $name,
            'resume' => $this->faker->realText(rand(500, 1500)),
            'bio' => $this->faker->realText(rand(100, 250)),
            'phone' => $this->faker->phoneNumber,
            'avatar' => "https://picsum.photos/200/200?random=".rand(1, 99),
            'cover' => "https://picsum.photos/1200/400?random=".rand(1, 99),
            'social_networks' => [
                'website' => 'https://google.com',
                'github' => 'https://github.com/torvalds',
                'linkedin' => 'https://github.com/torvalds',
                'facebook' => 'https://github.com/torvalds',
                'twitter' => 'https://github.com/torvalds',
                'instagram' => 'https://github.com/torvalds',
            ],
        ];
    }
}
