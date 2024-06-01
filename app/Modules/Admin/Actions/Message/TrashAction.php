<?php
namespace Admin\Actions\Message;
use Illuminate\Http\Request;
use Admin\Models\{
    Message
};
class TrashAction
{
    public function execute(Request $request)
    {
        $record = Message::find($request->resource_id);
        if(!$record)
            return false;
        $record->deleted_by = auth('admin')->user()->id;
        $record->save();
        $record->delete();
        return $record->id;
    }
}
