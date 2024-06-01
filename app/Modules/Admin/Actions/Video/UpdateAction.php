<?php
namespace Admin\Actions\Video;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    Video
};
class UpdateAction
{
    public function execute(Request $request,$id)
    {
        $record        = Video::find($id);

        $video = $record->video;
        if($request->file('video'))
        {
            FileTrait::RemoveSingleFile($video);
            $video = FileTrait::storeSingleFile($request->file('video'), 'videos');
        }
        $record->name               = $request->input('name');
        $record->is_featured        = $request->input('is_featured');
        $record->video              = $video;
        $record->save();
        return $record;

    }
}
