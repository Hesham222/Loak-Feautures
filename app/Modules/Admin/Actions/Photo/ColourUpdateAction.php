<?php
namespace Admin\Actions\Photo;
use Illuminate\Http\Request;
use Admin\Models\{
    PhotoColour
};
class ColourUpdateAction
{
    public function execute(Request $request)
    {
        $data = $request->all();

        PhotoColour::where('photo_id',$request->input('record_id'))->delete();

            for ($i=0;$i<count($data['colour']);$i++) {

                $schedule = new PhotoColour();
                $schedule->photo_id  = $request->input('record_id');
                $schedule->colour    = $request->colour[$i];
                $schedule->save();
            }
    }
}
