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
        return [
            'avatar' => null,
            'cover' => null,
            'enrollment' => 'sl.12.eeeed2022',
            'document' => '268.509.540-32', // CPF
            'registration_proof' => null,
            'birth_date' => '2000-01-01',
            'open_to_work' => true,
            'academic_institution_email' => 'nomecompleto.sl000@academico.ifsul.edu.br',
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
