<?php
namespace Admin\Actions\Award;

use Illuminate\Http\Request;

use Admin\Models\{
    Award
};

class DestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = Award::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
