<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view ('contact');
    }
    public function store()
    {
        request()->validate(['email'=>'required|email']);
        //Send the email
        // $email = request('email');

        // dd($email);

        Mail::raw('It Works!',function($message){
            $message->to(request('email'))
                    ->subject('Hello There!');
        });


        return redirect('/contact');
    }
}
?>