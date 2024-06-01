<?php
namespace Admin\Actions\Photo;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    PhotoSection
};
class SectionUpdateAction
{
    public function execute(Request $request,$id)
    {
        $record                         = PhotoSection::find($id);


        if (!PhotoSection::where(['photo_id'=> $record->photo_id,'order'=>$request->input('order')])->exists()){

            $record->name                   = $request->input('name');
            $record->order                  = $request->input('order');
            $record->save();

            foreach ($record->SectionValues as $sectionValue)
            {
                $text = $request->input('text-'.$sectionValue->id);
                $file = $request->file('attachment-'.$sectionValue->id);
                if (!is_null($text))
                    $sectionValue->text = $text;
                if (!is_null($file))
                {
                    FileTrait::RemoveSingleFile($sectionValue->image);
                    $newFile = FileTrait::storeSingleFile($file,'photo_sections');
                    $sectionValue->image = $newFile;
                }
                $sectionValue->save();
            }
            return $record;

        }elseif ($record->order == $request->input('order')){
            //dd('hesham');

            $record->name                   = $request->input('name');
            $record->order                  = $request->input('order');
            $record->save();

            foreach ($record->SectionValues as $sectionValue)
            {
                $text = $request->input('text-'.$sectionValue->id);
                $file = $request->file('attachment-'.$sectionValue->id);
                if (!is_null($text))
                    $sectionValue->text = $text;
                if (!is_null($file))
                {
                    FileTrait::RemoveSingleFile($sectionValue->image);
                    $newFile = FileTrait::storeSingleFile($file,'photo_sections');
                    $sectionValue->image = $newFile;
                }
                $sectionValue->save();
            }
            return $record;
        }


    }
}
