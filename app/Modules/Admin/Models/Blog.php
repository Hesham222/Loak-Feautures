<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Admin\Models\Admin', 'deleted_by')->withTrashed();
    }

    public function Sections(){

        return $this->hasMany(BlogSection::class,'blog_id')->orderBy('order','asc');
    }
}
