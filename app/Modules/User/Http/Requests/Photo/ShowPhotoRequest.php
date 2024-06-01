<?php

namespace User\Http\Requests\Photo;
use User\Http\Requests\BaseRequest;

class ShowPhotoRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'id'    =>'required|integer|exists:photos,id',
        ];
    }

}
