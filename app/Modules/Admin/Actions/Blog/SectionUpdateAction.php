<?php
namespace Admin\Actions\Blog;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    BlogSection
};
class SectionUpdateAction
{
    public function execute(Request $request,$id)
    {
        $record                         = BlogSection::find($id);

        if (!BlogSection::where(['blog_id'=> $record->blog_id,'order'=>$request->input('order')])->exists()){
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
                    $newFile = FileTrait::storeSingleFile($file,'blog_sections');
                    $sectionValue->image = $newFile;
                }
                $sectionValue->save();
            }
            return $record;

        }elseif ($record->order == $request->input('order')){
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
                    $newFile = FileTrait::storeSingleFile($file,'blog_sections');
                    $sectionValue->image = $newFile;
                }
                $sectionValue->save();
            }
            return $record;
        }

    }
}
