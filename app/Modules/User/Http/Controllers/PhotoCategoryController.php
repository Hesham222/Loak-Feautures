<?php

namespace User\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use User\Http\Resources\PhotoCategory\{
    PhotoCategoryCollection
};
use Admin\Models\{

    PhotoCategory
};


class PhotoCategoryController extends BaseResponse
{
    public function __invoke(){

        try {
            $categories = PhotoCategory::orderBy('create_at', 'desc')->where(['is_featured'=>1])->get();

            return $this->response(200, 'photo categories', 200, [], 0, [
                'photo categories'    => new PhotoCategoryCollection($categories),

            ]);
        } catch (\Exception $e) {

            DB::rollback();
            return $this->response(500, $e->getMessage(), 200);
        }
    }



}
