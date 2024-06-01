<?php

namespace User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Admin\Actions\{
    ProjectCategory\FilterAction as FilterAction,

};
use User\Http\Resources\ProjectCategory\{
    ProjectCategoryCollection
};
use Admin\Models\{

    ProjectCategory
};
use User\Http\Resources\PaginationResource;

class ProjectCategoryController extends BaseResponse
{
    public function index(){

        $categories = ProjectCategory::orderBy('created_at', 'desc')->where(['is_featured'=>1])->get();

        return $this->response(200, 'project categories', 200, [], 0, [
            'project categories'    => new ProjectCategoryCollection($categories),

        ]);
    }
    public function search(Request $request,FilterAction $filterAction ){
        try {

            $search    = $filterAction->execute($request)->where(['is_featured'=>1])->orderBy('created_at','desc')->paginate(10)->appends($request->except('page'));

            return $this->response(200, 'Search project category', 200, [], 0, [
                'search project category' => new ProjectCategoryCollection($search),
                'pagination'      => new PaginationResource($search),

            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response(500, $e->getMessage(), 500);
        }

    }

}
