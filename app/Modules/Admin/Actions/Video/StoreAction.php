<?php
namespace Admin\Actions\Video;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    Video
};
class StoreAction
{
    public function execute(Request $request)
    {
        $file = FileTrait::storeSingleFile($request->file('video'),'videos');

        $record =  Video::create([
            'name'          => $request->input('name'),
            'is_featured'   => $request->input('is_featured'),
            'video'         => $file,

        ]);

        return $record;


    }
}
