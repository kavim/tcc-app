<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call([UserTypeSeed::class, UserSeed::class]);
        // criando categorias padrão
        $this->call([CategorySeed::class]);
        // criando produtos padrão
        $this->call([ProductSeed::class]);
    }
}
