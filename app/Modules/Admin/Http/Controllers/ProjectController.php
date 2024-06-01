<?php

namespace Admin\Http\Controllers;
use Admin\Models\ProjectCategory;
use Admin\Models\ProjectSection;
use Admin\Models\ProjectSectionType;
use Admin\Models\ProjectTypeOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Admin\Actions\Project\{
    StoreAction,
    SectionStoreAction,
    SectionUpdateAction,
    SectionDestroyAction,
    SectionFilterAction,
    UpdateAction,
    TrashAction,
    RestoreAction,
    DestroyAction,
    FilterAction,
};
use Admin\Http\Requests\Project\{
    StoreRequest,
    SectionStoreRequest,
    SectionUpdateRequest,
    SectionRemoveRequest,
    UpdateRequest,
    RemoveRequest,
    FilterDateRequest
};

use Admin\Exports\Project\{
    ExportData,
    SectionExportData,
};

use Admin\Models\{
    Project
};

class ProjectController extends JsonResponse
{
    public function index()
    {
        $project_categories = ProjectCategory::select(['id','name'])->where(['is_featured'=>1])->get();

        return view('Admin::projects.index',compact('project_categories'));
    }

    public function create()
    {

        $project_categories = ProjectCategory::select(['id','name'])->where(['is_featured'=>1])->get();
        return view('Admin::projects.create',compact('project_categories'));
    }

    public function store(StoreRequest $request, StoreAction $storeAction)
    {

        DB::beginTransaction();
        try {
            $storeAction->execute($request);
            DB::commit();
            return redirect()->route('admins.project.index')->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later.')->withInput();
        }
    }
    public function storeFeature($id)
    {
        DB::beginTransaction();
        try {
            $record = Project::FindOrFail($id);
            if ($record->is_featured == 0){
                $record->is_featured = 1;
            }else{

                $record->is_featured = 0;
            }
            $record->save();
            DB::commit();

            if ($record->is_featured == 0)
                return back()->with('success','Feature is no');
            else
                return back()->with('success','Feature is yes');

        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later.')->withInput();
        }
    }

    public function appendOptions(Request $request){
        try {
            if($request->ajax()){
                $data = $request->all();
                $options = ProjectTypeOption::where(['section_type_id'=>$data['section_type_id']])->get();
                return view('Admin::projects.sections.append_options',compact('options'))->render();
            }
        } catch (\Exception $ex) {
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
        return $this->response(500, 'Failed, Please try again later.', 200);
    }


    public function edit($id)
    {
        $record             = Project::findOrFail($id);
        $project_categories = ProjectCategory::select(['id','name'])->where(['is_featured'=>1])->get();

        return view('Admin::projects.edit', compact('record','project_categories'));
    }

    public function update(UpdateRequest $request, UpdateAction $updateAction, $id)
    {
        DB::beginTransaction();
        try {
            $updateAction->execute($request, $id);
            DB::commit();
            return redirect()->route('admins.project.index')->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later.')->withInput();
        }
    }


    public function data(FilterDateRequest $request, FilterAction $filterAction)
    {
        $records = $filterAction->execute($request)
            ->orderBy('id','DESC')
            ->paginate(10)->appends([
                'view'       => $request->input('view'),
                'column'     => $request->input('column'),
                'value'      => $request->input('value'),
                'start_date' => $request->input('start_date'),
                'end_date'   => $request->input('end_date'),
                'category'   => $request->input('category'),

            ]);

        $result = view('Admin::projects.components.table_body',compact('records'))->render();
        return response()->json(['result' => $result, 'links' => $records->links()->render()], 200);
    }


    public function export(FilterDateRequest $request, FilterAction $filterAction)
    {
        try{
            $records = $filterAction->execute($request)->orderBy('id','DESC')->get();
            return Excel::download(new ExportData($records), 'projects_data.csv');
        }
        catch (\Exception $ex){
            return redirect()->back()->with('error', 'Error occurred, Please try again later.');
        }
    }

    public function trash(RemoveRequest $request, TrashAction $trashAction)
    {
        DB::beginTransaction();
        try {
            $record =  $trashAction->execute($request);
            if(!$record)
                return $this->response(500, 'Failed, This record is not found .', 200);
            DB::commit();
            return $this->response(200, 'Data moved to trash successfully.', 200, [], $record, ['module' => 'projects', 'trashesCount' => $this->countTrashes()]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
    }

    public function destroy(Request $request, DestroyAction $destroyAction, $id)
    {
        DB::beginTransaction();
        try {
            $record =  $destroyAction->execute($request, $id);
            if(!$record)
                return $this->response(500, 'Failed, This record is not found .', 200);
            DB::commit();
            return $this->response(200, 'Data has been deleted successfully.', 200, [], $record, ['module' => 'projects', 'trashesCount' => $this->countTrashes()]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
    }

    public function restore(RemoveRequest $request, RestoreAction $restoreAction)
    {
        DB::beginTransaction();
        try {
            $record =  $restoreAction->execute($request);
            DB::commit();
            return $this->response(200, 'Data has been restored successfully.', 200, [], $record, ['module' => 'projects', 'trashesCount' => $this->countTrashes()]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
    }

    private function countTrashes()
    {
        return Project::onlyTrashed()->count();
    }

    public function sections($id)
    {
        $record               = Project::findOrFail($id);
        $sectionTypes   = ProjectSectionType::get();

        return view('Admin::projects.sections.indexSection', compact('record','sectionTypes'));
    }

    public function sectionData(FilterDateRequest $request, SectionFilterAction $filterAction)
    {
        $records = $filterAction->execute($request)
            ->orderBy('order','ASC')
            ->where('project_id',$request->input('record_id'))
            ->paginate(10)->appends([
                'view'       => $request->input('view'),
                'column'     => $request->input('column'),
                'value'      => $request->input('value'),
                'start_date' => $request->input('start_date'),
                'end_date'   => $request->input('end_date'),
                'sectionType'=> $request->input('sectionType'),
            ]);

        $result = view('Admin::projects.sections.components.table_body',compact('records'))->render();
        return response()->json(['result' => $result, 'links' => $records->links()->render()], 200);
    }

    public function createSection($id)
    {
        $sectionTypes   = ProjectSectionType::get();
        $record_id      = $id;
        return view('Admin::projects.sections.create',compact('sectionTypes','record_id'));
    }
    public function storeSection(SectionStoreRequest $request, SectionStoreAction $sectionStoreAction)
    {
        DB::beginTransaction();
        try {
            $record =  $sectionStoreAction->execute($request);
            if (!$record){
                return redirect()->back()->with('error','Failed, Please try again later Or check if the order number is repeated')->withInput();
            }
            DB::commit();
            return redirect()->route('admins.project.sections',$record->project_id)->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later Or check if the order number is repeated.')->withInput();
        }
    }
    public function editSection($id)
    {
        $record     = ProjectSection::findOrFail($id);
        return view('Admin::projects.sections.edit',compact('record'));
    }

    public function updateSection(SectionUpdateRequest $request, SectionUpdateAction $updateAction, $id)
    {
        DB::beginTransaction();
        try {
            $record = $updateAction->execute($request, $id);
            DB::commit();
            return redirect()->route('admins.project.sections',$record->project_id)->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later Or check if the order number is repeated.')->withInput();
        }
    }
    public function exportSection(FilterDateRequest $request, SectionFilterAction $filterAction)
    {
        try{
            $records = $filterAction->execute($request)->orderBy('id','DESC')->get();
            return Excel::download(new SectionExportData($records), 'project_sections_data.csv');
        }
        catch (\Exception $ex){
            return redirect()->back()->with('error', 'Error occurred, Please try again later.');
        }
    }
    public function destroySection(SectionRemoveRequest $request, SectionDestroyAction $destroyAction, $id)
    {
        DB::beginTransaction();
        try {
            $record =  $destroyAction->execute($request, $id);
            if(!$record)
                return $this->response(500, 'Failed, This record is not found .', 200);
            DB::commit();
            return $this->response(200, 'Data has been deleted successfully.', 200, [], $record, ['module' => 'projects', 'trashesCount' => $this->countTrashes()]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
    }
}
