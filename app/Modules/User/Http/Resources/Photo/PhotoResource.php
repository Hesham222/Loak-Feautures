<?php

namespace User\Http\Resources\Photo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use User\Http\Resources\Photo\Colour\ColourCollection;
use User\Http\Resources\Photo\Section\SectionCollection;


class PhotoResource extends JsonResource
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
            'photo_category'            => $this->PhotoCategory? $this->PhotoCategory->name : "--",
            'image'                     => $this->image ? asset('storage'.DS() . $this->image) : null,
            'sections'                  => $this->Sections ? new SectionCollection($this->Sections) : "__",
            'Colours'                   => $this->PhotoColours ? new ColourCollection($this->PhotoColours) : "No Colour Found",
            'createdDate'               => date('d M Y', strtotime($this->created_at)) ." - ". date('h:i a', strtotime($this->created_at)),

        ];
    }
}
