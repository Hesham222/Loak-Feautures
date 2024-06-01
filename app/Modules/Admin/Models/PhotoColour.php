<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoColour extends Model
{
    use HasFactory;

    public function Photo(){

        return $this->belongsTo(Photo::class,'photo_id');
    }
}
