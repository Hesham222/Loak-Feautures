<?php
namespace User\Actions\Subscriber;

use Admin\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberAction
{
    public function execute(Request $request)
    {

        $record = Subscriber::create([
            'email'         => $request->input('email'),
        ]);

        return $record;
    }
}
