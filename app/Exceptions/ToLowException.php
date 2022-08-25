<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class ToLowException extends Exception
{
    public function report() {
        Log::error('Ein Problem...'.ToLowException::class);
    }

    public function render($request) {
        //abort(404, $this->message);
        return response()->json(['error' => true, "message" => $this->getMessage()]);
        //return response()->view('name.des.templates', [], 500);
    }
}
