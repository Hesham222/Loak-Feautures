<?php
namespace Admin\Actions\Message;
use Illuminate\Http\Request;
use Admin\Models\{
    Message
};

class RestoreAction
{
    public function execute(Request $request)
    {
        $record = Message::onlyTrashed()->find($request->resource_id);
        $record->deleted_by = null;
        $record->save();
        $record->restore();
        return $record->id;
    }
}
