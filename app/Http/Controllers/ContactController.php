<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if($request->isMethod('post')) {
            // Wenn Formular abgeschickt wird
        }
        else {
            // Wenn per get aufgerufen wird
            return view('contact');
        }
    }
}
