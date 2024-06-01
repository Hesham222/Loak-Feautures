<?php

namespace User\Http\Resources\Photo\Section\TypeValues;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class TypeValuesResource extends JsonResource
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
            'image'                       => $this->image ? asset('storage'.DS() . $this->image) : null,
            'text'                        => $this->text ? $this->text : null,

        ];
    }
}
