<?php

namespace User\Http\Resources\Photo\Colour;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ColourCollection extends ResourceCollection
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
    		array_push($data, new ColourResource($record));
    	}
    	return $data;
    }
}
