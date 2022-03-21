<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ["admin", "editor", "company", "regular-user"];

        foreach ($types as $t) {
            \App\Models\UserType::create(['name'=>$t]);
        }
    }
}
