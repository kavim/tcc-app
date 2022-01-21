<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory([
            'name' => 'Ademir',
            'email' => 'ademir@loscarpinchos.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'user_type_id' => 1,
            'password' => \Hash::make('123senha123')
        ])->create();

        \App\Models\User::factory([
            'name' => 'Editor',
            'email' => 'editor@loscarpinchos.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'user_type_id' => 2,
            'password' => \Hash::make('123senha123')
        ])->create();

        \App\Models\User::factory([
            'name' => 'Company',
            'email' => 'company@loscarpinchos.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'user_type_id' => 3,
            'password' => \Hash::make('123senha123')
        ])->create();

        \App\Models\User::factory([
            'name' => 'regular Bro',
            'email' => 'regularuser@loscarpinchos.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'user_type_id' => 4,
            'password' => \Hash::make('123senha123')
        ])->create();
    }
}
