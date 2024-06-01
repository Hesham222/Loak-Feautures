<?php

namespace User\Http\Resources\Video;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class VideoResource extends JsonResource
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
            'video'                     => $this->video ? asset('storage'.DS() . $this->video) : null,
            'createdDate'               => date('d M Y', strtotime($this->created_at)) ." - ". date('h:i a', strtotime($this->created_at)),

        ];
    }
}
