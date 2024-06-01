<?php

namespace User\Http\Controllers;

use User\Http\Resources\Award\{
    AwardCollection
};
use Admin\Models\{
    Award
};
use User\Http\Resources\PaginationResource;

class AwardController extends BaseResponse
{
    public function __invoke(){

        $all_awards = Award::orderBy('created_at', 'desc')->where(['is_featured'=>1])->get();

        return $this->response(200, 'awards', 200, [], 0, [
            'awards'        =>  new AwardCollection($all_awards),

        ]);
    }

}
