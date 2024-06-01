<?php

namespace User\Http\Controllers;

use Illuminate\Support\Facades\DB;
use User\Actions\Message\{
    MessageAction
};
use User\Http\Resources\Message\{
    MessageResource
};
use User\Http\Requests\Message\{
    MessageRequest,
};
use Admin\Models\{
    Message
};


class MessageController extends BaseResponse
{


    public function __invoke(MessageRequest $request , MessageAction $messageAction){

        DB::beginTransaction();
        try {
            $record = $messageAction->execute($request);
            DB::commit();
            return $this->response(200, 'The message has been sent to the admin successfully.', 200, [], 0, [
                'message' => new MessageResource($record),
            ]);
        }
        catch (\Exception $e) {
            DB::rollback();
            return $this->response(500, $e->getMessage(), 500);
        }
    }
}
