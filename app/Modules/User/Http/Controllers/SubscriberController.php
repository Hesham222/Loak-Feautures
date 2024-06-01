<?php

namespace User\Http\Controllers;

use Illuminate\Support\Facades\DB;
use User\Actions\Subscriber\{
    SubscriberAction
};
use User\Http\Resources\Subscriber\{
    SubscriberResource
};
use User\Http\Requests\Subscriber\{
    SubscriberRequest,
};
use Admin\Models\{
    Subscriber
};


class SubscriberController extends BaseResponse
{


    public function __invoke(SubscriberRequest $request , SubscriberAction $SubscriberAction){

        DB::beginTransaction();
        try {
            $record = $SubscriberAction->execute($request);
            DB::commit();
            return $this->response(200, 'The Subscriber has been saved successfully.', 200, [], 0, [
                'Subscriber' => new SubscriberResource($record),
            ]);
        }
        catch (\Exception $e) {
            DB::rollback();
            return $this->response(500, $e->getMessage(), 500);
        }
    }
}
