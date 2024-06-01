<?php
namespace Admin\Actions\Blog;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    Blog
};
class StoreAction
{
    public function execute(Request $request)
    {
        $file = FileTrait::storeSingleFile($request->file('image'),'blogs');

        $record =  Blog::create([
            'name'          => $request->input('name'),
            'is_featured'   => $request->input('is_featured'),
            'image'    => $file,

        ]);

        return $record;


    }
}
