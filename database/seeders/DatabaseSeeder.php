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
        $i = 1;

        \App\Models\User::factory(10)->create()->each(function($user) use(&$i){
            $user->email = "user_{$i}@gmail.com";
            $user->update();
            $i++;
        });
    }
}
