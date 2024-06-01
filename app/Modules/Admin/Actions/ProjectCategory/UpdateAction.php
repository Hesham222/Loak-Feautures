<?php
namespace Admin\Actions\ProjectCategory;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    ProjectCategory
};
class UpdateAction
{
    public function execute(Request $request,$id)
    {
        $record        = ProjectCategory::find($id);

        $image = $record->image;
        if($request->file('image'))
        {
            FileTrait::RemoveSingleFile($image);
            $image = FileTrait::storeSingleFile($request->file('image'), 'projectCategories');
        }
        $record->name               = $request->input('name');
        $record->is_featured        = $request->input('is_featured');
        $record->image              = $image;
        $record->save();
        return $record;

    }
}
