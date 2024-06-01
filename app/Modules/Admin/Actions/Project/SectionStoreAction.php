<?php
namespace Admin\Actions\Project;
use Admin\Models\ProjectSectionValue;
use Admin\Models\ProjectTypeOption;
use App\Http\Traits\FileTrait;
use Illuminate\Http\Request;
use Admin\Models\{
    ProjectSection
};
class SectionStoreAction
{
    public function execute(Request $request)
    {
        if (!ProjectSection::where(['project_id'=> $request->input('project_id'),'order'=>$request->input('order')])->exists())
        {
            $record =  ProjectSection::create([
                'name'                  => $request->input('name'),
                'project_id'            => $request->input('project_id'),
                'section_type_id'       => $request->input('section_type_id'),
                'order'                 => $request->input('order'),

            ]);

            $file               = FileTrait::storeMultiple($request->file('attachment'),'project_sections');
            foreach ($request['attachment'] as $key => $value) {

                if(!empty($value)){

                    $data = new ProjectSectionValue();
                    $data->project_section_id       = $record->id;

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
