<?php
namespace Admin\Actions\Project;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    Project
};
class StoreAction
{
    public function execute(Request $request)
    {
        $file = FileTrait::storeSingleFile($request->file('image'),'projects');

        if(isset($request->is_featured)){
            $record =  Project::create([
                'name'                  => $request->input('name'),
                'project_category_id'   => $request->input('project_category_id'),
                'is_featured'           => $request->input('is_featured'),
                'location'              => $request->input('location'),
                'area'                  => $request->input('area'),
                'image'                 => $file,

            ]);
        }else{
            $record =  Project::create([
                'name'                  => $request->input('name'),
                'project_category_id'   => $request->input('project_category_id'),
                'is_featured'           => '0',
                'location'              => $request->input('location'),
                'area'                  => $request->input('area'),
                'image'                 => $file,

            ]);
        }


        return $record;


    }
}
