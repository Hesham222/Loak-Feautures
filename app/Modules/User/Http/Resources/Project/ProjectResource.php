<?php

namespace User\Http\Resources\Project;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use User\Http\Resources\Project\Section\SectionCollection;


class ProjectResource extends JsonResource
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
            'project_category'          => $this->ProjectCategory? $this->ProjectCategory->name : "--",
            'image'                     => $this->image ? asset('storage'.DS() . $this->image) : null,
            'location'                  => $this->location ? $this->location : "--",
            'area'                      => $this->area ? $this->area : "--",
            'sections'                  => $this->Sections ? new SectionCollection($this->Sections) : "__",
            'createdDate'               => date('d M Y', strtotime($this->created_at)) ." - ". date('h:i a', strtotime($this->created_at)),

        ];
    }
}
