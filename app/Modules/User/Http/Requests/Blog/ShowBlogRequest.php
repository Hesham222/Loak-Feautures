<?php

namespace User\Http\Requests\Blog;
use User\Http\Requests\BaseRequest;

class ShowBlogRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'id'    =>'required|integer|exists:blogs,id',
        ];
    }

}
