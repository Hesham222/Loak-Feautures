<?php

use Admin\Models\BlogSectionType;
use Illuminate\Database\Seeder;


class BlogSectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogSectionType::create([
            'name' => 'Left image with Right text',
        ]);
        BlogSectionType::create([
            'name' => 'One text',
        ]);
        BlogSectionType::create([
            'name' => 'Three images',
        ]);
    }
}
