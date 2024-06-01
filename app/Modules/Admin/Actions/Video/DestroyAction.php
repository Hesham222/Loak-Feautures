<?php
namespace Admin\Actions\Video;

use Illuminate\Http\Request;

use Admin\Models\{
    Video
};

class DestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = Video::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
