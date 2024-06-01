<?php
namespace Admin\Actions\Blog;
use Illuminate\Http\Request;
use Admin\Models\{
    Blog
};

class RestoreAction
{
    public function execute(Request $request)
    {
        $record = Blog::onlyTrashed()->find($request->resource_id);
        $record->deleted_by = null;
        $record->save();
        $record->restore();
        return $record->id;
    }
}
