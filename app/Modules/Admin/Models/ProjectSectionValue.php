<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSectionValue extends Model
{
    use SoftDeletes ;

    public function ProjectSection(){

        return $this->belongsTo(ProjectSection::class,'project_section_id');
    }

}
