<?php

use Admin\Models\PhotoTypeOption;
use Illuminate\Database\Seeder;


class PhotoTypeOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhotoTypeOption::create([
            'section_type_id' => 1,
            'type' => 'image',
        ]);
        PhotoTypeOption::create([
            'section_type_id' => 1,
            'type' => 'image',
        ]);
        PhotoTypeOption::create([
            'section_type_id' => 1,
            'type' => 'image',
        ]);
        PhotoTypeOption::create([
            'section_type_id' => 2,
            'type' => 'image',
        ]);

        PhotoTypeOption::create([
            'section_type_id' => 3,
            'type' => 'image',
        ]);
        PhotoTypeOption::create([
            'section_type_id' => 3,
            'type' => 'image',
        ]);
        PhotoTypeOption::create([
            'section_type_id' => 4,
            'type' => 'image',
        ]);
        PhotoTypeOption::create([
            'section_type_id' => 4,
            'type' => 'image',
        ]);
    }
}
