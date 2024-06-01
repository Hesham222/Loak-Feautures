<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Admin\Models\Admin', 'deleted_by')->withTrashed();
    }

    public function ProjectCategory(){

        return $this->belongsTo(ProjectCategory::class,'project_category_id');
    }

    public function Sections(){

        return $this->hasMany(ProjectSection::class,'project_id')->orderBy('order','asc');
    }
}
