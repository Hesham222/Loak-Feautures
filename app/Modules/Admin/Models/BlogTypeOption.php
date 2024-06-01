<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class BlogTypeOption extends Model
{
    use SoftDeletes ;

    public function SectionType(){

        return $this->belongsTo(BlogSectionType::class,'section_type_id');
    }
}
