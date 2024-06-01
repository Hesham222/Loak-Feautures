<?php

namespace User\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseResponse extends Controller
{
    public function response($code, $message, $statusCode, $validations = [], $item = 0, $object = null)
    {
        return response()->json(['code' => $code, 'message' => $message, 'validation' => $validations,
            'item' => $item, 'data' => $object], $statusCode);
    }


    public function apiResponse($code = 200, $message = null, $errors = null, $data = null){

        $array = [
            $code => 200,
            $message => $message
        ];

        if (is_null($data) && !is_null($errors)){
            $array['errors'] = $errors;
        }elseif (is_null($errors) && !is_null($data)){
            $array['data'] = $data;
        }else{
            $array['data'] = $data;
            $array['errors'] = $errors;
        }

        return response($array , 200);

    }
}
