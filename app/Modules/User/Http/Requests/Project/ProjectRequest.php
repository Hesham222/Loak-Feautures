<?php

namespace User\Http\Requests\Project;
use User\Http\Requests\BaseRequest;

class ProjectRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'project_category_id'    =>'required|integer|exists:project_categories,id',
        ];
    }

}
