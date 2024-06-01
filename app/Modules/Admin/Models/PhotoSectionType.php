<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoSectionType extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Organization\Models\OrganizationAdmin', 'deleted_by')->withTrashed();
    }

    public function Options(){

        return $this->hasMany(PhotoTypeOption::class,'section_type_id');
    }
}
