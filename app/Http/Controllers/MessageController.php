<?php

namespace App\Http\Controllers;

use App\Mail\Mailtrap;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class MessageController extends Controller
{
    public function store(Request $request, Message $message)
    {
        $request->validate([
            'email'=>'required',
            'message'=>'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048'
        ]);

        $message->message = $request->get('message');
        $message->photo_url = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('/images'), $message->photo_url);
        $message->code = sha1(Str::random(32));

        $message->save();

       $request->session()->flash('success','Message send' );

        Mail::to($request->get('email'))->send(new Mailtrap($message->code));

        return redirect('/');
    }

    public function show(Request $request, Message $message)
    {
       $msg =  $message::where('code', substr($request->getRequestUri(), 1))->get()->first();

           if(!$msg){

               return view('message', ['errorMsg' => 'Vous avez déja visionné le snapmail !']);
           }

        $message->where('code', substr($request->getRequestUri(), 1))->get()->first()->delete();

        return view('message', ['msg' => $msg]);
    }
}
