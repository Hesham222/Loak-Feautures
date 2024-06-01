<?php
namespace Admin\Actions\Photo;
use Illuminate\Http\Request;
use Admin\Models\{
    PhotoColour
};
class ColourStoreAction
{
    public function execute(Request $request)
    {

        $data = $request->all();

        foreach ($data['colour'] as $key => $value) {

            if(!empty($value)){

                $schedule = new PhotoColour();
                $schedule->photo_id  = $request->input('record_id');
                $schedule->colour    = $value;
                $schedule->save();
            }
        }


    }
}
