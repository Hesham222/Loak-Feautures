<?php

namespace User\Http\Controllers;

use Admin\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Admin\Actions\{
    Project\FilterAction as FilterAction,

};
use User\Http\Resources\Project\{
    ProjectCollection
};
use User\Http\Requests\Project\{
    ProjectRequest,
    ShowProjectRequest
};
use Admin\Models\{

    ProjectCategory
};
use User\Http\Resources\PaginationResource;
use User\Http\Resources\Project\ProjectResource;

class ProjectController extends BaseResponse
{

    public function index(ProjectRequest $request){

        $projects = Project::orderBy('created_at', 'desc')->where(['project_category_id'=>$request->input('project_category_id'),'is_featured'=>1])->get();

        return $this->response(200, 'projects', 200, [], 0, [
            'projects'          => new ProjectCollection($projects),

        ]);
    }

    public function showProject(ShowProjectRequest $request){

         $id = $request->input('id');
         $project = Project::where(['is_featured'=>1])->findOrFail($id);

        return $this->response(200, 'show project', 200, [], 0, [
            'show project'          => new ProjectResource($project),

        ]);
    }

    public function search(Request $request,FilterAction $filterAction ){
        try {

            $search    = $filterAction->execute($request)->where(['is_featured'=>1])->orderBy('created_at','desc')->paginate(10)->appends($request->except('page'));

            return $this->response(200, 'Search project', 200, [], 0, [
                'search project'    => new ProjectCollection($search),
                'pagination'        => new PaginationResource($search),

            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response(500, $e->getMessage(), 500);
        }

    }
}
