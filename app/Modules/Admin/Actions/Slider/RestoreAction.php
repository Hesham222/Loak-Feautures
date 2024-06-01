<?php
namespace Admin\Actions\Slider;
use Illuminate\Http\Request;
use Admin\Models\{
    Slider
};

class RestoreAction
{
    public function execute(Request $request)
    {
        $record = Slider::onlyTrashed()->find($request->resource_id);
        $record->deleted_by = null;
        $record->save();
        $record->restore();
        return $record->id;
    }
}
