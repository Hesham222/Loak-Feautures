<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class BlogSectionType extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Organization\Models\OrganizationAdmin', 'deleted_by')->withTrashed();
    }

    public function Options(){

        return $this->hasMany(BlogTypeOption::class,'section_type_id');
    }
}
