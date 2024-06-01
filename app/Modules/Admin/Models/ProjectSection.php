<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSection extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Admin\Models\Admin', 'deleted_by')->withTrashed();
    }

    public function ProjectSectionType(){

        return $this->belongsTo(ProjectSectionType::class,'section_type_id');
    }

    public function Project(){

        return $this->belongsTo(Project::class,'project_id');
    }

    public function SectionValues(){

        return $this->hasMany(ProjectSectionValue::class,'project_section_id');
    }
}
