<?php

namespace App\Helpers;

class ApiRequest
{
    protected static $response = [
        'code'      => null,
        'message'   => null,
        'data'      => null,
    ];

    public static function render($code = null, $message = null, $data = null)
    {
        self::$response['data'] = $data;
        self::$response['code'] = $code;
        self::$response['message'] = $message;

        return response()->json(self::$response, self::$response['code']);
    }
}
