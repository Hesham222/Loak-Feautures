<?php

namespace User\Http\Resources\Blog;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use User\Http\Resources\Blog\Section\SectionCollection;


class BlogResource extends JsonResource
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
            'name'                      => $this->name? $this->name : "--",
            'image'                     => $this->image ? asset('storage'.DS() . $this->image) : null,
            'createdDate'               => date('d M Y', strtotime($this->created_at)),
            'sections'                  => $this->Sections ? new SectionCollection($this->Sections) : "__",

        ];
    }
}
