<?php
namespace Admin\Actions\Award;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    Award
};
class StoreAction
{
    public function execute(Request $request)
    {
        $file = FileTrait::storeSingleFile($request->file('image'),'awards');

        $record =  Award::create([
            'name'          => $request->input('name'),
            'is_featured'   => $request->input('is_featured'),
            'image'    => $file,

        ]);

        return $record;


    }
}
