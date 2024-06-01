<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class BlogSection extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Admin\Models\Admin', 'deleted_by')->withTrashed();
    }

    public function BlogSectionType(){

        return $this->belongsTo(BlogSectionType::class,'section_type_id');
    }

    public function Blog(){

        return $this->belongsTo(Blog::class,'blog_id');
    }

    public function SectionValues(){

        return $this->hasMany(BlogSectionValue::class,'blog_section_id');
    }
}
