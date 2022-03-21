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
            $student = \App\Models\Student::factory([
                'user_id' => $user->id
            ])->create();
        });

        $faker = \Faker\Factory::create();

        foreach ($users as $key => $user) {

            $student = \App\Models\Student::where('user_id', $user->id)->first();

            echo $student->id;

            $student->courses()->attach(
                \App\Models\Course::inRandomOrder()->first()->id,
                [
                    'completed' => $is_course_completed = $faker->boolean,
                    'completed_at' => $is_course_completed ? $faker->dateTimeBetween('-1 years', 'now') : null,
                    'started_at' => $is_course_completed ? $faker->dateTimeBetween('-2 years', '-1 years') : null,
                ],
                false
            );
        }


        // $user->each(function ($user) {
        //     $user->student()->courses()->attach(
        //         \App\Models\Course::inRandomOrder()->first()->id,
        //         [
        //             'is_course_completed' => $is_course_completed = $this->faker->boolean,
        //             'course_completed_at' => $is_course_completed ? $this->faker->dateTimeBetween('-1 years', 'now') : null,
        //             'course_started_at' => $is_course_completed ? $this->faker->dateTimeBetween('-2 years', '-1 years') : null,
        //         ]
        //     );
        // });
    }
}
