<?php
namespace Admin\Actions\Project;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    Project
};
class UpdateAction
{
    public function execute(Request $request,$id)
    {
        $record        = Project::find($id);

        $image = $record->image;
        if($request->file('image'))
        {
            FileTrait::RemoveSingleFile($image);
            $image = FileTrait::storeSingleFile($request->file('image'), 'projects');
        }
        $record->name                   = $request->input('name');
        $record->project_category_id    = $request->input('project_category_id');
        $record->location               = $request->input('location');
        $record->area                   = $request->input('area');
        if(isset($request->is_featured)){
            $record->is_featured            = $request->input('is_featured');
        }else{
            $record->is_featured            = "0";
        }

        $record->image                  = $image;
        $record->save();
        return $record;

    }
}
