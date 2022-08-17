<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function form()
    {
        //dd(request()->session()->get('fav', 'Nicht da...'));
        return view('contactForm')
            ->withPage('contact')
            ->withErrorArr([]);
    }

    public function submit(Request $request)
    {
        $errors = [];

        if(empty($request->email)) { // TODO: richtige Validierung einbauen
            $errors[] = 'email';
        }

        if(empty($request->msg)) {
            $errors[] = 'msg';
        }

        if(count($errors) > 0) {
            return view('contactForm')
                    ->withPage('contact')
                    ->withErrorArr($errors);
        }

        return view('contact')->withPage('contact');
    }
}
