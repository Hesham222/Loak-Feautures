<?php

namespace User\Http\Requests\Message;
use User\Http\Requests\BaseRequest;

class MessageRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'name'          => 'required|string|max:191',
            'email'         => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/|max:191',
            'phone'         => 'required|string|regex:/^\+?\d+$/|min:10|max:15',
            'message'       => 'required|string|min:2',


        ];
    }

}
