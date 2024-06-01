<?php

namespace Admin\Models;

use Admin\Models\PhotoColour;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Admin\Models\Admin', 'deleted_by')->withTrashed();
    }

    public function PhotoCategory(){

        return $this->belongsTo(PhotoCategory::class,'photo_category_id');
    }
    public function Sections(){

        return $this->hasMany(PhotoSection::class,'photo_id')->orderBy('order','asc');
    }
    public function PhotoColours(){

        return $this->hasMany(PhotoColour::class,'photo_id');
    }
}
