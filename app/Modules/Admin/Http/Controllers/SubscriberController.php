<?php

namespace Admin\Http\Controllers;

use Admin\Actions\Subscriber\{
    FilterAction,
};
use Admin\Http\Requests\Subscriber\{
    FilterDateRequest
};


class SubscriberController extends JsonResponse
{
    public function index()
    {
        return view('Admin::subscribers.index');
    }

    public function data(FilterDateRequest $request, FilterAction $filterAction)
    {
        $records = $filterAction->execute($request)
            ->orderBy('id','DESC')
            ->paginate(10)->appends([
                'view'       => $request->input('view'),
                'column'     => $request->input('column'),
                'value'      => $request->input('value'),
                'start_date' => $request->input('start_date'),
                'end_date'   => $request->input('end_date'),
            ]);

        $result = view('Admin::subscribers.components.table_body',compact('records'))->render();
        return response()->json(['result' => $result, 'links' => $records->links()->render()], 200);
    }
}
