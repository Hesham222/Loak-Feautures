<?php
namespace Admin\Actions\ProjectCategory;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    ProjectCategory
};
class StoreAction
{
    public function execute(Request $request)
    {
        $file = FileTrait::storeSingleFile($request->file('image'),'projectCategories');

        $record =  ProjectCategory::create([
            'name'          => $request->input('name'),
            'is_featured'   => $request->input('is_featured'),
            'image'    => $file,

        ]);

        return $record;


    }
}
