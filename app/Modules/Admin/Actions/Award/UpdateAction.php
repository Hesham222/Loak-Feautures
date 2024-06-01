<?php
namespace Admin\Actions\Award;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    Award
};
class UpdateAction
{
    public function execute(Request $request,$id)
    {
        $record        = Award::find($id);

        $image = $record->image;
        if($request->file('image'))
        {
            FileTrait::RemoveSingleFile($image);
            $image = FileTrait::storeSingleFile($request->file('image'), 'awards');
        }
        $record->name               = $request->input('name');
        $record->is_featured        = $request->input('is_featured');
        $record->image              = $image;
        $record->save();
        return $record;

    }
}
