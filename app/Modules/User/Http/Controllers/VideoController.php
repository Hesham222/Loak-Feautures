<?php

namespace User\Http\Controllers;

use User\Http\Resources\Video\{
    VideoCollection
};
use Admin\Models\{
    Video
};
use User\Http\Resources\PaginationResource;

class VideoController extends BaseResponse
{
    public function __invoke(){

        $all_videos = Video::orderBy('created_at', 'desc')->where(['is_featured'=>1])->get();

        $videos = $all_videos->paginate(10);

        return $this->response(200, 'videos', 200, [], 0, [
            'videos'        =>  new VideoCollection($videos),
            'pagination'    =>  new PaginationResource($videos),

        ]);
    }

}
