<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoCategory extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Admin\Models\Admin', 'deleted_by')->withTrashed();
    }

    public function Photos(){

        return $this->hasMany(Photo::class,'photo_category_id');
    }
}
