<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            'slug_name' => 'ademir',
            'email' => 'ademir@loscarpinchos.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'user_type_id' => 1,
            'password' => \Hash::make('123senha123')
        ])->create();

        \App\Models\User::factory([
            'name' => 'Editor',
            'slug_name' => 'editor',
            'email' => 'editor@loscarpinchos.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'user_type_id' => 2,
            'password' => \Hash::make('123senha123')
        ])->create();

        \App\Models\User::factory([
            'name' => 'Company',
            'slug_name' => 'company',
            'email' => 'company@loscarpinchos.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'user_type_id' => 3,
            'password' => \Hash::make('123senha123')
        ])->create();

        $user = \App\Models\User::factory([
            'name' => 'regular Bro',
            'slug_name' => 'regular_bro',
            'email' => 'regularuser@loscarpinchos.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'user_type_id' => 4,
            'password' => \Hash::make('123senha123')
        ])->create();

        $student = \App\Models\Student::factory([
            'user_id' => $user->id,
        ])->create();

        $users = \App\Models\User::factory(50)->create();

        $users->each(function ($user) {
            \App\Models\Student::factory([
                'user_id' => $user->id,
            ])->create();
        });
    }
}
