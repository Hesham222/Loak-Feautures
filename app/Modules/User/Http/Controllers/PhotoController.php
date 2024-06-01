<?php

namespace User\Http\Controllers;

use User\Http\Resources\Photo\{
    PhotoCollection,
    PhotoResource
};
use User\Http\Requests\Photo\{
    PhotoRequest,
    ShowPhotoRequest
};
use Admin\Models\{
    Photo
};
use User\Http\Resources\PaginationResource;

class PhotoController extends BaseResponse
{

    public function index(PhotoRequest $request){

        $photos   = Photo::orderBy('created_at', 'desc')->where(['photo_category_id'=>$request->input('photo_category_id')])->get();

        return $this->response(200, 'photos', 200, [], 0, [
            'photos'          =>  new PhotoCollection($photos),

        ]);
    }

    public function showPhoto(ShowPhotoRequest $request){

        $id = $request->input('id');

        $photo = Photo::findOrFail($id);

        return $this->response(200, 'show photo', 200, [], 0, [
            'show photo'          => new PhotoResource($photo),

        ]);
    }
}
