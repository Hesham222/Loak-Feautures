<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class BlogSectionValue extends Model
{
    use SoftDeletes ;

    public function BlogSection(){

        return $this->belongsTo(BlogSection::class,'blog_section_id');
    }
}
