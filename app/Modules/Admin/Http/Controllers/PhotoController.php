<?php

namespace Admin\Http\Controllers;
use Admin\Models\PhotoCategory;
use Admin\Models\PhotoSection;
use Admin\Models\PhotoSectionType;
use Admin\Models\PhotoTypeOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Admin\Actions\Photo\{
    StoreAction,
    SectionStoreAction,
    ColourStoreAction,
    ColourUpdateAction,
    SectionUpdateAction,
    SectionFilterAction,
    SectionDestroyAction,
    UpdateAction,
    TrashAction,
    RestoreAction,
    DestroyAction,
    FilterAction,
};
use Admin\Http\Requests\Photo\{
    StoreRequest,
    ColourStoreRequest,
    SectionStoreRequest,
    SectionUpdateRequest,
    SectionRemoveRequest,
    UpdateRequest,
    RemoveRequest,
    FilterDateRequest
};

use Admin\Exports\Photo\{
    ExportData,
    SectionExportData,
};

use Admin\Models\{
    Photo
};

class PhotoController extends JsonResponse
{
    public function index()
    {
        $photo_categories = PhotoCategory::select(['id','name'])->where(['is_featured'=>1])->get();

        return view('Admin::photos.index',compact('photo_categories'));
    }

    public function create()
    {
        $photo_categories = PhotoCategory::select(['id','name'])->where(['is_featured'=>1])->get();
        return view('Admin::photos.create',compact('photo_categories'));
    }

    public function store(StoreRequest $request, StoreAction $storeAction)
    {
        DB::beginTransaction();
        try {
            $storeAction->execute($request);
            DB::commit();
            return redirect()->route('admins.photo.index')->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later.')->withInput();
        }
    }

    public function appendOptions(Request $request){
        try {
            if($request->ajax()){
                $data = $request->all();
                $options = PhotoTypeOption::where(['section_type_id'=>$data['section_type_id']])->get();
                return view('Admin::photos.sections.append_options',compact('options'))->render();
            }
        } catch (\Exception $ex) {
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
        return $this->response(500, 'Failed, Please try again later.', 200);
    }


    public function edit($id)
    {
        $record             = Photo::findOrFail($id);
        $photo_categories   = PhotoCategory::select(['id','name'])->where(['is_featured'=>1])->get();

        return view('Admin::photos.edit', compact('record','photo_categories'));
    }

    public function update(UpdateRequest $request, UpdateAction $updateAction, $id)
    {
        DB::beginTransaction();
        try {
            $updateAction->execute($request, $id);
            DB::commit();
            return redirect()->route('admins.photo.index')->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later.')->withInput();
        }
    }


    public function colour($id)
    {
        $record               = Photo::findOrFail($id);
        return view('Admin::photos.colour', compact('record'));
    }
    public function getColourRow()
    {

        $results = view('Admin::photos.components.colours.row',
            [

            ])->render();

        return $this->response(200, 'Schedules Row', 200, [], 0, ['responseHTML' => $results]);
    }
    public function storeColour(Request $request, ColourStoreAction $sectionStoreAction)
    {
        DB::beginTransaction();
        try {
            $record =  $sectionStoreAction->execute($request);
            DB::commit();
            return redirect()->route('admins.photo.index')->with('success','Colour has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later.')->withInput();
        }
    }
    public function ColoursView($id)
    {
        $record               = Photo::findOrFail($id);
        return view('Admin::photos.colours', compact('record'));
    }
    public function UpdateColour(Request $request, ColourUpdateAction $colourUpdateAction)
    {
        DB::beginTransaction();
        try {
            $record =  $colourUpdateAction->execute($request);
            DB::commit();
            return redirect()->route('admins.photo.index')->with('success','Colour has been Updated successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later.')->withInput();
        }
    }
    public function deleteColour($id)
    {
        DB::beginTransaction();
        try {
            Photo::where('id',$id)->update([
                'colour' => Null
            ]);
            DB::commit();
            return redirect()->route('admins.photo.index')->with('success','Colour has been deleted successfully.');
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

        $result = view('Admin::photos.components.table_body',compact('records'))->render();
        return response()->json(['result' => $result, 'links' => $records->links()->render()], 200);
    }

    public function export(FilterDateRequest $request, FilterAction $filterAction)
    {
        try{
            $records = $filterAction->execute($request)->orderBy('id','DESC')->get();
            return Excel::download(new ExportData($records), 'photos_data.csv');
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
            return $this->response(200, 'Data moved to trash successfully.', 200, [], $record, ['module' => 'photos', 'trashesCount' => $this->countTrashes()]);
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
            return $this->response(200, 'Data has been deleted successfully.', 200, [], $record, ['module' => 'photos', 'trashesCount' => $this->countTrashes()]);
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
            return $this->response(200, 'Data has been restored successfully.', 200, [], $record, ['module' => 'photos', 'trashesCount' => $this->countTrashes()]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
    }

    private function countTrashes()
    {
        return Photo::onlyTrashed()->count();
    }

    public function sections($id)
    {
        $record                 = Photo::findOrFail($id);
        $sectionTypes           = PhotoSectionType::get();

        return view('Admin::photos.sections.indexSection', compact('record','sectionTypes'));
    }

    public function sectionData(FilterDateRequest $request, SectionFilterAction $filterAction)
    {

        $records = $filterAction->execute($request)
            ->where('photo_id',$request->input('record_id'))
            ->orderBy('order','ASC')
            ->paginate(10)->appends([
                'view'       => $request->input('view'),
                'column'     => $request->input('column'),
                'value'      => $request->input('value'),
                'start_date' => $request->input('start_date'),
                'end_date'   => $request->input('end_date'),
            ]);

        $result = view('Admin::photos.sections.components.table_body',compact('records'))->render();
        return response()->json(['result' => $result, 'links' => $records->links()->render()], 200);
    }
    public function createSection($id)
    {
        $sectionTypes   = PhotoSectionType::get();
        $record_id      = $id;
        return view('Admin::photos.sections.create',compact('sectionTypes','record_id'));
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
            return redirect()->route('admins.photo.sections',$record->photo_id)->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later Or check if the order number is repeated')->withInput();
        }
    }

    public function editSection($id)
    {
        $record     = PhotoSection::findOrFail($id);
        return view('Admin::photos.sections.edit',compact('record'));
    }

    public function updateSection(SectionUpdateRequest $request, SectionUpdateAction $updateAction, $id)
    {
        DB::beginTransaction();
        try {
            $record = $updateAction->execute($request, $id);
            DB::commit();
            return redirect()->route('admins.photo.sections',$record->photo_id)->with('success','Data has been saved successfully.');
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error','Failed, Please try again later Or check if the order number is repeated.')->withInput();
        }
    }
    public function exportSection(FilterDateRequest $request, SectionFilterAction $filterAction)
    {
        try{
            $records = $filterAction->execute($request)->orderBy('id','DESC')->get();
            return Excel::download(new SectionExportData($records), 'photo_sections_data.csv');
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
            return $this->response(200, 'Data has been deleted successfully.', 200, [], $record, ['module' => 'photos', 'trashesCount' => $this->countTrashes()]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->response(500, 'Failed, Please try again later.', 200);
        }
    }
}
