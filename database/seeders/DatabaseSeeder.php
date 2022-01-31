<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
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
        // criando usuarios padrão
        $this->call([UserTypeSeeder::class, UserSeeder::class]);
        // criando categorias padrão
        $this->call([CategorySeeder::class]);
        // criando produtos padrão
        $this->call([PostSeeder::class]);
    }
}
