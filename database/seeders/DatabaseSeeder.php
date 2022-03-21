<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CourseSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\UserTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // criando cursos
        $this->call(CourseSeeder::class);

        // criando usuarios padrão
        $this->call([
            UserTypeSeeder::class,
            UserSeeder::class
        ]);

        // criando categorias e produtos padrão
        $this->call([
            CategorySeeder::class,
            PostSeeder::class
        ]);

        $this->call([
            AddressSeeder::class,
        ]);
    }
}
