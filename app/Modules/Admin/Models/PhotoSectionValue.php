<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoSectionValue extends Model
{
    use SoftDeletes ;

    public function PhotoSection(){

        return $this->belongsTo(PhotoSection::class,'photo_section_id');
    }
}
