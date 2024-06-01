<?php

namespace User\Http\Resources\Message;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class MessageResource extends JsonResource
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
            'email'                     => $this->email ? $this->email : "--",
            'phone'                     => $this->phone ? $this->phone : "--",
            'message'                   => $this->message ? $this->message : "--",
            'createdDate'               => date('d M Y', strtotime($this->created_at)) ." - ". date('h:i a', strtotime($this->created_at)),

        ];
    }
}
