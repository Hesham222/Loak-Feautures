<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectCategory extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Admin\Models\Admin', 'deleted_by')->withTrashed();
    }

    public function Projects(){

        return $this->hasMany(Project::class,'project_category_id');
    }

    public function getFeature()
    {
        return $this->is_featured == '1' ? 'Yes'  : 'No' ;
    }
}
