<?php
namespace Admin\Actions\Project;
use Illuminate\Http\Request;
use Admin\Models\Project;
use Carbon\Carbon;
class FilterAction
{
    public function execute(Request $request)
    {
        return Project::when($request->input('view') == 'trash', function ($query) use ($request) {
            return $query->onlyTrashed();
        })->with(['deletedBy' => function ($query) use ($request) {
            $query->select(['id','name']);
        }])->with('ProjectCategory')
        ->select(['id','name', 'image','area','is_featured','project_category_id','location','deleted_by','deleted_at', 'created_at'])
        ->when($request->input('start_date') && $request->input('end_date'), function ($query) use ($request) {
            return $query->whereBetween('created_at',[Carbon::parse($request->input('start_date')), Carbon::parse($request->input('end_date'))]);
        })
        //sub query used in search field
        ->when($request->input('column') && $request->input('value'), function ($query) use ($request){
            return $query->when($request->input('column') == 'createdBy', function ($query) use ($request) {
                return $query->whereHas('createdBy', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->input('value') . '%');
                    });
                })
                ->when($request->input('column') == 'deletedBy' , function ($query) use ($request){
                    return $query->whereHas('deletedBy', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->input('value') . '%');
                    });
                })
                ->when($request->input('column') == '_id', function ($query) use ($request){
                    return $query->where('id',  $request->input('value') );
                })
                ->when($request->input('column') == 'name', function ($query) use ($request){
                    return $query->where('name', 'like', '%' . $request->input('value') . '%');
                })
                ->when($request->input('column') == 'location', function ($query) use ($request){
                    return $query->where('location', 'like', '%' . $request->input('value') . '%');

                });
        })->when($request->input('category'), function ($query) use ($request){
                return $query->where('project_category_id',  $request->input('category') );

            })->when($request->input('category_name'), function ($query) use ($request){
                return $query->whereHas('ProjectCategory',function ($q) use ($request){
                    $q-> where('name', 'like', '%' .  $request->input('category_name'). '%' );
                });

            })->when($request->input('project_name'), function ($query) use ($request){
                return $query->where('name', 'like', '%' .  $request->input('project_name'). '%' );

            })->when($request->input('location'), function ($query) use ($request){
                return $query->where('location', 'like', '%' .  $request->input('location'). '%' );
            });

    }
}
