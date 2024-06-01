<?php

namespace User\Http\Resources\Photo\Colour;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use User\Http\Resources\Photo\Section\TypeValues\TypeValuesCollection;


class ColourResource extends JsonResource
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
            'colour'                    => $this->colour? $this->colour : "No Colour Found",
        ];
    }
}
