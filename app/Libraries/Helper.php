<?php

namespace App\Libraries;

class Helper {

    public function jsonResponse($message, $data, $code){
        return response()->json(['message' => $message, 'data' => $data], $code);
    }

}
