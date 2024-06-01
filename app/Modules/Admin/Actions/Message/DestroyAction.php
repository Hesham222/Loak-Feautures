<?php
namespace Admin\Actions\Message;

use Illuminate\Http\Request;

use Admin\Models\{
    Message
};

class DestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = Message::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
