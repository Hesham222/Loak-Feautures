<?php

namespace User\Http\Requests\Project;
use User\Http\Requests\BaseRequest;

class ShowProjectRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'id'    =>'required|integer|exists:projects,id',
        ];
    }

}
