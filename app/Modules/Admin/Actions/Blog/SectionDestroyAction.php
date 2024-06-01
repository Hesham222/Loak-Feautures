<?php
namespace Admin\Actions\Blog;

use Admin\Models\BlogSection;
use Illuminate\Http\Request;

use Admin\Models\{
    Blog
};

class SectionDestroyAction
{
    public function execute(Request $request, $id)
    {
        $record = BlogSection::withTrashed()->find($id);
        if(!$record)
            return false;
        $record->forceDelete();
        return $request->resource_id;
    }
}
