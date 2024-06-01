<?php

use Admin\Models\ProjectSectionType;
use Illuminate\Database\Seeder;


class SectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectSectionType::create([
            'name' => 'Left image with Right text',
        ]);
        ProjectSectionType::create([
            'name' => 'Three images',
        ]);
        ProjectSectionType::create([
            'name' => 'One image',
        ]);
        ProjectSectionType::create([
            'name' => 'A two third image Left with one image Right',
        ]);
        ProjectSectionType::create([
            'name' => 'Left text with Right image',
        ]);
        ProjectSectionType::create([
            'name' => 'One image Left with a two third image Right.',
        ]);
    }
}
