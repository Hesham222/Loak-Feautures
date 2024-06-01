<?php
namespace Admin\Actions\Blog;
use Admin\Models\BlogSection;
use Admin\Models\BlogSectionValue;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    ProjectSection
};
class SectionStoreAction
{
    public function execute(Request $request)
    {
        if (!BlogSection::where(['blog_id'=> $request->input('blog_id'),'order'=>$request->input('order')])->exists()){
            $record =  BlogSection::create([
                'name'                  => $request->input('name'),
                'blog_id'               => $request->input('blog_id'),
                'section_type_id'       => $request->input('section_type_id'),
                'order'                 => $request->input('order'),

            ]);
            if (isset($request->attachment)){
                $file               = FileTrait::storeMultiple($request->file('attachment'),'blog_sections');

                foreach ($request['attachment'] as $key => $value) {

                    if(!empty($value)){

                        $data = new BlogSectionValue();
                        $data->blog_section_id       = $record->id;

                        $data->image                = $file[$key];

                        if(isset($request['text'][$key])){

                            $data->text             = $request['text'][$key];
                        }
                        $data->save();
                    }
                }
            }else{
                foreach ($request['text'] as $key => $value) {

                    if(!empty($value)){

                        $data = new BlogSectionValue();
                        $data->blog_section_id       = $record->id;

                        $data->image                = Null;

                        if(isset($request['text'][$key])){

                            $data->text             = $request['text'][$key];
                        }
                        $data->save();
                    }
                }
            }


            return $record;
        }else{
            return false;
        }




    }
}
