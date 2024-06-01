<?php

namespace User\Http\Requests\Subscriber;
use User\Http\Requests\BaseRequest;

class SubscriberRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'email' => 'required|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/|unique:subscribers|max:191',
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'You Are Already Subscribed',
        ];
    }
}
