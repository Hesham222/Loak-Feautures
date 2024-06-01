<?php
namespace Admin\Actions\PhotoCategory;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    PhotoCategory
};
class UpdateAction
{
    public function execute(Request $request,$id)
    {
        $record        = PhotoCategory::find($id);

        $image = $record->image;
        if($request->file('image'))
        {
            $image = FileTrait::storeSingleFile($request->file('image'), 'projectCategories');
        }
        $record->name               = $request->input('name');
        $record->is_featured        = $request->input('is_featured');
        $record->image              = $image;
        $record->save();
        return $record;

    }
}
