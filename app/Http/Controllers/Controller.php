<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnJsonException(\Throwable $e) {
        $result = [
            "status" => is_numeric($e->getCode()) ? ($e->getCode() > 0 & $e->getCode() < 1000 ? $e->getCode() : 500) : 500,
            "error" => $e->getMessage()
        ];
        return response()->json($result, $result["status"]);
    }

    public function returnSuccess($message = null, $code = null) {
        $result = [
            "status" => is_null($code) ? 200 : ($code > 999 ? 200 : $code),
            "message" => $message
        ];
        return response()->json($result, $result["status"]);
    }

    public function returnWarning($message = null, $code = null) {
        $result = [
            "status" => is_null($code) ? 200 : ($code > 999 ? 400 : $code),
            "message" => $message
        ];

        return response()->json($result, $result["status"]);
    }
}
