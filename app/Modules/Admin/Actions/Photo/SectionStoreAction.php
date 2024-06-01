<?php
namespace Admin\Actions\Photo;
use Admin\Models\PhotoSectionValue;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    PhotoSection
};
class SectionStoreAction
{
    public function execute(Request $request)
    {

            if (!PhotoSection::where(['photo_id'=> $request->input('photo_id'),'order'=>$request->input('order')])->exists())
            {
                $record =  PhotoSection::create([
                    'name'                  => $request->input('name'),
                    'photo_id'              => $request->input('photo_id'),
                    'section_type_id'       => $request->input('section_type_id'),
                    'order'                 => $request->input('order'),

                ]);

                $file               = FileTrait::storeMultiple($request->file('attachment'),'photo_sections');
                foreach ($request['attachment'] as $key => $value) {

                    if(!empty($value)){

                        $data = new PhotoSectionValue();
                        $data->photo_section_id     = $record->id;

                        $data->image                = $file[$key];

                        if(isset($request['text'][$key])){

                            $data->text             = $request['text'][$key];
                        }
                        $data->save();
                    }
                }

                return $record;
            }else{
                return false;

            }

    }
}
