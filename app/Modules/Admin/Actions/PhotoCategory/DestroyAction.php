<?php
namespace Admin\Actions\PhotoCategory;

use Illuminate\Http\Request;

use Admin\Models\{
    PhotoCategory
};

class DestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = PhotoCategory::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
