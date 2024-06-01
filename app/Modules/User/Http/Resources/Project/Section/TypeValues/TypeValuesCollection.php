<?php

namespace User\Http\Resources\Project\Section\TypeValues;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TypeValuesCollection extends ResourceCollection
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
    		array_push($data, new TypeValuesResource($record));
    	}
    	return $data;
    }
}
