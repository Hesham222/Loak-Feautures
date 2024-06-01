<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectTypeOption extends Model
{
    use SoftDeletes ;

    public function SectionType(){

        return $this->belongsTo(ProjectSectionType::class,'section_type_id');
    }
}
