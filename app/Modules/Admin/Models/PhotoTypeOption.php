<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoTypeOption extends Model
{
    use SoftDeletes ;

    public function SectionType(){

        return $this->belongsTo(PhotoSectionType::class,'section_type_id');
    }
}
