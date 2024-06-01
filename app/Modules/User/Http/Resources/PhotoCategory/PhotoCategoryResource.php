<?php

namespace User\Http\Resources\PhotoCategory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use User\Http\Resources\Photo\PhotoCollection;


class PhotoCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'                        => intval($this->id),
            'name'                      => $this->name ? $this->name : "--",
            'image'                     => $this->image ? asset('storage'.DS() . $this->image) : null,
            'createdDate'               => date('d M Y', strtotime($this->created_at)) ." - ". date('h:i a', strtotime($this->created_at)),
            'children'                  => $this->Photos ? new PhotoCollection($this->Photos) : "__",
        ];
    }
}
