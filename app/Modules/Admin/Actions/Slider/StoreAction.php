<?php
namespace Admin\Actions\Slider;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    Slider
};
class StoreAction
{
    public function execute(Request $request)
    {
        $file = FileTrait::storeSingleFile($request->file('attachment'),'slider');

        $allowed = array('jpeg', 'png', 'jpg','gif','svg');
        $video_allowed = array('mp4', 'MP2T','ogx','oga','ogv','ogg','webm','wmv', '3gpp','quicktime','x-msvideo','x-ms-wmv','avi');
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if (in_array($ext, $allowed)) {

            $record =  Slider::create([
                'type'          => 'image',
                'attachment'    => $file,
            ]);
        }elseif (in_array($ext, $video_allowed)){
            $record =  Slider::create([
                'type'          => 'video',
                'attachment'    => $file,
            ]);
        }


        return $record;


    }
}
