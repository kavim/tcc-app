<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'avatar' => "https://picsum.photos/200/200?random=".rand(1, 99),
            'cover' => "https://picsum.photos/1200/800?random=".rand(1, 99),
            'enrollment' => $this->faker->unique()->randomNumber(8),
            'document' => $faker->cpf, // CPF
            'registration_proof' => null,
            'birth_date' => '2000-01-01',
            'open_to_work' => true,
            'academic_institution_email' => $this->faker->unique()->safeEmail(),
            'social_networks' => [
                'website' => 'https://google.com',
                'github' => 'https://github.com/torvalds',
                'linkedin' => 'https://github.com/torvalds',
                'facebook' => 'https://github.com/torvalds',
                'twitter' => 'https://github.com/torvalds',
                'instagram' => 'https://github.com/torvalds',
            ],
            'resume' => $faker->realText(rand(500, 1500)),
            'bio' => $faker->realText(rand(100, 250)),
        ];
    }
}
