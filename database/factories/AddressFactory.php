<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->address,
            'zip' => $this->faker->postcode,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'default' => $this->faker->boolean,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
