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
         \App\Models\User::factory()->create(['email' => 'javiergomezve@gmail.com']);
         \App\Models\WebSite::factory(10)->create();
    }
}
