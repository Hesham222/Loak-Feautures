<?php
namespace Admin\Actions\Photo;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    Photo
};
class UpdateAction
{
    public function execute(Request $request,$id)
    {
        $record        = Photo::find($id);

        $image = $record->image;
        if($request->file('image'))
        {
            FileTrait::RemoveSingleFile($image);
            $image = FileTrait::storeSingleFile($request->file('image'), 'photos');
        }
        $record->photo_category_id    = $request->input('photo_category_id');

        $record->image                  = $image;
        $record->save();
        return $record;

    }
}
