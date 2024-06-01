<?php
namespace Admin\Actions\Photo;

use Illuminate\Http\Request;

use Admin\Models\{
    Photo
};

class DestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = Photo::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
