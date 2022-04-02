<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

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

        $companies = \App\Models\User::factory([
            'name' => 'Company',
            'slug_name' => 'company',
            'email' => 'company@loscarpinchos.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'user_type_id' => 3,
            'password' => \Hash::make('123senha123')
        ])->create();

        $user = \App\Models\User::factory([
            'name' => 'Usuario de teste',
            'slug_name' => 'usuario_de_teste',
            'email' => 'usuariodeteste@probi.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'user_type_id' => 4,
            'password' => \Hash::make('123senha123')
        ])->create();

        $student = \App\Models\Student::factory([
            'user_id' => $user->id,
        ])->create();

        $student->courses()->attach(
            \App\Models\Course::inRandomOrder()->first()->id,
            [
                'completed' => $is_course_completed = $faker->boolean,
                'completed_at' => $is_course_completed ? $faker->dateTimeBetween('-1 years', 'now') : null,
                'started_at' => $faker->dateTimeBetween('-1 years', 'now'),
            ],
            false
        );

        // criando varios usuarios para teste

        $users = \App\Models\User::factory(10)->create();

        $users->each(function ($user) {
            $student = \App\Models\Student::factory([
                'user_id' => $user->id
            ])->create();
        });

        echo "\n Start UserStudent relationship \n";

        foreach ($users as $key => $user) {

            $student = \App\Models\Student::where('user_id', $user->id)->first();

            echo $student->id.", ";

            $student->courses()->attach(
                \App\Models\Course::inRandomOrder()->first()->id,
                [
                    'completed' => $is_course_completed = $faker->boolean,
                    'completed_at' => $is_course_completed ? $faker->dateTimeBetween('-1 years', 'now') : null,
                    'started_at' => $faker->dateTimeBetween('-1 years', 'now'),
                ],
                false
            );
        }

        echo "\nfinished\n";
        echo "\n Start UserCompany relationship \n";

        $companies->each(function ($company) {

            echo $company->id.", ";

            $company = \App\Models\Company::factory([
                'user_id' => $company->id
            ])->create();
        });

        echo "\nfinished\n";
    }
}
