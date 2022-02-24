<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::all();

        foreach ($users as $user) {
            $address = \App\Models\Address::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
