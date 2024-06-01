<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(\SectionTypeSeeder::class);
        $this->call(\TypeOptionSeeder::class);
        $this->call(\BlogSectionTypeSeeder::class);
        $this->call(\BlogTypeOptionSeeder::class);
        $this->call(\PhotoSectionTypeSeeder::class);
        $this->call(\PhotoTypeOptionSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
