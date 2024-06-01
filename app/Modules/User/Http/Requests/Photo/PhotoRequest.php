<?php

namespace User\Http\Requests\Photo;
use User\Http\Requests\BaseRequest;

class PhotoRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'photo_category_id'    =>'required|integer|exists:photo_categories,id',
        ];
    }

}
