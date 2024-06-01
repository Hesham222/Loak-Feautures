<?php

use Admin\Models\BlogTypeOption;
use Illuminate\Database\Seeder;


class BlogTypeOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogTypeOption::create([
            'section_type_id' => 1,
            'type' => 'image',
        ]);
        BlogTypeOption::create([
            'section_type_id' => 1,
            'type' => 'text',
        ]);
        BlogTypeOption::create([
            'section_type_id' => 2,
            'type' => 'text',
        ]);

        BlogTypeOption::create([
            'section_type_id' => 3,
            'type' => 'image',
        ]);
        BlogTypeOption::create([
            'section_type_id' => 3,
            'type' => 'image',
        ]);
        BlogTypeOption::create([
            'section_type_id' => 3,
            'type' => 'image',
        ]);
    }
}
