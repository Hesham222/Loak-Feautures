<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoSection extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Admin\Models\Admin', 'deleted_by')->withTrashed();
    }

    public function PhotoSectionType(){

        return $this->belongsTo(PhotoSectionType::class,'section_type_id');
    }

    public function Photo(){

        return $this->belongsTo(Photo::class,'photo_id');
    }

    public function SectionValues(){

        return $this->hasMany(PhotoSectionValue::class,'photo_section_id');
    }
}
