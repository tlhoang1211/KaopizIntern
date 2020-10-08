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
        // \App\Models\User::factory(10)->create();
        $this->call([
            PostSeeder::class,
            UserSeeder::class,
            AdvanceUserSeeder::class,
            PhoneSeeder::class,
            RoleSeeder::class,
            CommentSeeder::class,
            RoleUserSeeder::class
        ]);
    }
}
