<?php

namespace Admin\Http\Controllers;
use Admin\Models\BlogSection;
use Admin\Models\BlogSectionType;
use Admin\Models\BlogTypeOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Admin\Actions\Blog\{
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
use Admin\Http\Requests\Blog\{
    StoreRequest,
    SectionStoreRequest,
    SectionUpdateRequest,
    SectionRemoveRequest,
    UpdateRequest,
    RemoveRequest,
    FilterDateRequest
};

use Admin\Exports\Blog\{
    ExportData,
    SectionExportData,
};

use Admin\Models\{
    Blog
};

class BlogController extends JsonResponse
{
    public function index()
    {
        return view('Admin::blogs.index');
    }

    public function create()
    {
        return view('Admin::blogs.create');
    }

    public function store(StoreRequest $request, StoreAction $storeAction)
    {
        DB::beginTransaction();
        try {
            $storeAction->execute($request);
            DB::commit();
            return redirect()->route('admins.blog.index')->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later.')->withInput();
        }
    }
    public function storeFeature($id)
    {
        DB::beginTransaction();
        try {
            $record = Blog::FindOrFail($id);
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
                $options = BlogTypeOption::where(['section_type_id'=>$data['section_type_id']])->get();
                return view('Admin::blogs.sections.append_options',compact('options'))->render();
            }
        } catch (\Exception $ex) {
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
        return $this->response(500, 'Failed, Please try again later.', 200);
    }


    public function edit($id)
    {
        $record = Blog::findOrFail($id);
        return view('Admin::blogs.edit', compact('record'));
    }

    public function update(UpdateRequest $request, UpdateAction $updateAction, $id)
    {

        DB::beginTransaction();
        try {
            $updateAction->execute($request, $id);
            DB::commit();
            return redirect()->route('admins.blog.index')->with('success','Data has been saved successfully.');
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
            ]);

        $result = view('Admin::blogs.components.table_body',compact('records'))->render();
        return response()->json(['result' => $result, 'links' => $records->links()->render()], 200);
    }

    public function export(FilterDateRequest $request, FilterAction $filterAction)
    {
        try{
            $records = $filterAction->execute($request)->orderBy('id','DESC')->get();
            return Excel::download(new ExportData($records), 'blogs_data.csv');
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
            return $this->response(200, 'Data moved to trash successfully.', 200, [], $record, ['module' => 'blogs', 'trashesCount' => $this->countTrashes()]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
    }

    public function destroy(RemoveRequest $request, DestroyAction $destroyAction, $id)
    {
        DB::beginTransaction();
        try {
            $record =  $destroyAction->execute($request, $id);
            if(!$record)
                return $this->response(500, 'Failed, This record is not found .', 200);
            DB::commit();
            return $this->response(200, 'Data has been deleted successfully.', 200, [], $record, ['module' => 'blogs', 'trashesCount' => $this->countTrashes()]);
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
            return $this->response(200, 'Data has been restored successfully.', 200, [], $record, ['module' => 'blogs', 'trashesCount' => $this->countTrashes()]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
    }

    private function countTrashes()
    {
        return Blog::onlyTrashed()->count();
    }

    public function sections($id)
    {
        $record                 = Blog::findOrFail($id);
        $sectionTypes           = BlogSectionType::get();

        return view('Admin::blogs.sections.indexSection', compact('record','sectionTypes'));
    }
    public function sectionData(FilterDateRequest $request, SectionFilterAction $filterAction)
    {
        $records = $filterAction->execute($request)
            ->where('blog_id',$request->input('record_id'))
            ->orderBy('order','ASC')
            ->paginate(10)->appends([
                'view'       => $request->input('view'),
                'column'     => $request->input('column'),
                'value'      => $request->input('value'),
                'start_date' => $request->input('start_date'),
                'end_date'   => $request->input('end_date'),
                'sectionType'=> $request->input('sectionType'),
            ]);

        $result = view('Admin::blogs.sections.components.table_body',compact('records'))->render();
        return response()->json(['result' => $result, 'links' => $records->links()->render()], 200);
    }
    public function createSection($id)
    {
        $sectionTypes   = BlogSectionType::get();
        $record_id      = $id;
        return view('Admin::blogs.sections.create',compact('sectionTypes','record_id'));
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
            return redirect()->route('admins.blog.sections',$record->blog_id)->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later Or check if the order number is repeated.')->withInput();
        }
    }
    public function editSection($id)
    {
        $record     = BlogSection::findOrFail($id);
        return view('Admin::blogs.sections.edit',compact('record'));
    }

    public function updateSection(SectionUpdateRequest $request, SectionUpdateAction $updateAction, $id)
    {
        DB::beginTransaction();
        try {
            $record = $updateAction->execute($request, $id);
            DB::commit();
            return redirect()->route('admins.blog.sections',$record->blog_id)->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later Or check if the order number is repeated.')->withInput();
        }
    }
    public function exportSection(FilterDateRequest $request, SectionFilterAction $filterAction)
    {
        try{
            $records = $filterAction->execute($request)->orderBy('id','DESC')->get();
            return Excel::download(new SectionExportData($records), 'blog_sections_data.csv');
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
            return $this->response(200, 'Data has been deleted successfully.', 200, [], $record, ['module' => 'blogs', 'trashesCount' => $this->countTrashes()]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
    }
}
