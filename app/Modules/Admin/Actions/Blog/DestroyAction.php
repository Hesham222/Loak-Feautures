<?php
namespace Admin\Actions\Blog;

use Illuminate\Http\Request;

use Admin\Models\{
    Blog
};

class DestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = Blog::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
