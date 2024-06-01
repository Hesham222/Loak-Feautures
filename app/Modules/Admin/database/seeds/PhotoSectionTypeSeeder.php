<?php

use Admin\Models\PhotoSectionType;
use Illuminate\Database\Seeder;


class PhotoSectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhotoSectionType::create([
            'name' => 'Three images',
        ]);
        PhotoSectionType::create([
            'name' => 'one image',
        ]);
        PhotoSectionType::create([
            'name' => 'A two third image Left with one image Right.',
        ]);
        PhotoSectionType::create([
            'name' => 'One image Left with a two third image Right.',
        ]);
    }
}
