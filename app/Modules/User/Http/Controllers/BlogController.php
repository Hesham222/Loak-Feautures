<?php

namespace User\Http\Controllers;

use User\Http\Resources\Blog\{
    BlogCollection,
    BlogResource
};
use User\Http\Requests\Blog\{
    ShowBlogRequest
};
use Admin\Models\{
    Blog
};
use User\Http\Resources\PaginationResource;

class BlogController extends BaseResponse
{

    public function index(){
        $blogs   = Blog::where(['is_featured'=>1])->orderBy('created_at', 'desc')->get();

        return $this->response(200, 'blogs', 200, [], 0, [
            'blogs'        =>  new BlogCollection($blogs),

        ]);
    }

    public function showBlog(ShowBlogRequest $request){

        $id = $request->input('id');

        $blog = Blog::where(['is_featured'=>1])->findOrFail($id);

        return $this->response(200, 'show blog', 200, [], 0, [
            'show blog'          => new BlogResource($blog),
        ]);
    }
}
