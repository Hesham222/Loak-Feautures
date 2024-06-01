<?php

namespace User\Http\Controllers;

use User\Http\Resources\Slider\{
    SliderCollection
};
use Admin\Models\{
    Slider
};
use User\Http\Resources\PaginationResource;

class SliderController extends BaseResponse
{
    public function __invoke(){

        $sliders = Slider::orderBy('created_at', 'desc')->get();

        return $this->response(200, 'slider', 200, [], 0, [

            'slider'        =>  new SliderCollection($sliders),

        ]);
    }

}
