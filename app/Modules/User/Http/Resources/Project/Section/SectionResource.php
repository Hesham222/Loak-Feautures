<?php

namespace User\Http\Resources\Project\Section;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use User\Http\Resources\Project\Section\TypeValues\TypeValuesCollection;
use User\Http\Resources\Project\Section\TypeValues\TypeValuesResource;


class SectionResource extends JsonResource
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
            'id'                          => intval($this->id),
            'name'                        => $this->name ? $this->name : "--",
            'project'                     => $this->Project ? $this->Project->name : "__",
            'type'                        => $this->ProjectSectionType ? $this->ProjectSectionType->name : "__",
            'type_options'                => $this->SectionValues ? new TypeValuesCollection($this->SectionValues) : "__",
            'order'                       => $this->order ? $this->order : "__",
            'createdDate'                 => date('d M Y', strtotime($this->created_at)) ." - ". date('h:i a', strtotime($this->created_at)),

        ];
    }
}
