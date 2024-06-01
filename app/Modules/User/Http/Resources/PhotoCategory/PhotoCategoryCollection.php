<?php

namespace User\Http\Resources\PhotoCategory;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PhotoCategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    	$data = [];
    	foreach ($this->collection as $record) {
    		array_push($data, new PhotoCategoryResource($record));
    	}
    	return $data;
    }
}
