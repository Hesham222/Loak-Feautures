<?php
namespace Admin\Actions\Award;
use Illuminate\Http\Request;
use Admin\Models\{
    Award
};
class TrashAction
{
    public function execute(Request $request)
    {
        $record = Award::find($request->resource_id);
        if(!$record)
            return false;
        $record->deleted_by = auth('admin')->user()->id;
        $record->save();
        $record->delete();
        return $record->id;
    }
}
