<?php
namespace Admin\Actions\Photo;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    Photo
};
class StoreAction
{
    public function execute(Request $request)
    {
        $file = FileTrait::storeSingleFile($request->file('image'),'photos');

            $record =  Photo::create([
                'photo_category_id'     => $request->input('photo_category_id'),
                'image'                 => $file,
            ]);

        return $record;


    }
}
