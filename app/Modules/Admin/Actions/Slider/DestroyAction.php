<?php
namespace Admin\Actions\Slider;

use Illuminate\Http\Request;

use Admin\Models\{
    Slider
};

class DestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = Slider::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
