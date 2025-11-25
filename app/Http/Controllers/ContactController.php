<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;

class ContactController extends Controller
{
    //
    function sendEmail(Request $request){
        $to=$request->email;
        $message=$request->message;
        $subject=$request->subject;
        $name=$request->name;
        Mail::to($to)->send(new ContactEmail($message, $subject,$name) );
        return redirect()->route('blogs.index');
    }
}
