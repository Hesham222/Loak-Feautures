<?php
namespace User\Actions\Message;

use Admin\Models\Message;
use Illuminate\Http\Request;

class MessageAction
{
    public function execute(Request $request)
    {

        $record = Message::create([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'phone'         => $request->input('phone'),
            'message'       => $request->input('message'),
        ]);

        return $record;
    }
}
