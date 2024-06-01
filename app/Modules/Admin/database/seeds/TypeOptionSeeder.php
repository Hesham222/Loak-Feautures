<?php

use Admin\Models\ProjectTypeOption;
use Illuminate\Database\Seeder;


class TypeOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectTypeOption::create([
            'section_type_id' => 1,
            'type' => 'image',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 1,
            'type' => 'text',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 2,
            'type' => 'image',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 2,
            'type' => 'image',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 2,
            'type' => 'image',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 3,
            'type' => 'image',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 4,
            'type' => 'image',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 4,
            'type' => 'image',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 5,
            'type' => 'text',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 5,
            'type' => 'image',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 6,
            'type' => 'image',
        ]);
        ProjectTypeOption::create([
            'section_type_id' => 6,
            'type' => 'image',
        ]);
    }
}
