<?php
namespace Admin\Actions\PhotoCategory;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    PhotoCategory
};
class StoreAction
{
    public function execute(Request $request)
    {
        $file = FileTrait::storeSingleFile($request->file('image'),'projectCategories');

        $record =  PhotoCategory::create([
            'name'          => $request->input('name'),
            'is_featured'   => $request->input('is_featured'),
            'image'    => $file,

        ]);

        return $record;


    }
}
