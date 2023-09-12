<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function responesewithSuccess($data, $message)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
            'success_code' => 200,
        ]);
    }
    public function responesewithError($message)
    {

        return response()->json([
            'success' => false,
            'data' => [],
            'message' => $message,
            'success_code' => 201,
        ]);
    }
}
