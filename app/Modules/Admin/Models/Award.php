<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Award extends Model
{
    use SoftDeletes ;

    public function deletedBy()
    {
        return $this->belongsTo('Admin\Models\Admin', 'deleted_by')->withTrashed();
    }
}
