<?php

namespace User\Http\Resources\Slider;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class SliderResource extends JsonResource
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
            'type'                      => $this->type ? $this->type : "--",
            'attachment'                => $this->attachment ? asset('storage'.DS() . $this->attachment) : null,
            'createdDate'               => date('d M Y', strtotime($this->created_at)) ." - ". date('h:i a', strtotime($this->created_at)),

        ];
    }
}
