<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addContact(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'body' => 'required'
        ]);

        \Mail::to("mrbadrjeddab@gmail.com")->send(new \App\Mail\ContactMail($request->all()));


    	return 'success';
    }

      
}
