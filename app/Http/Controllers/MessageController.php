<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::paginate(3);
        return view('auth.messages.index', compact('messages'));
    }

    public function show($messageId){
        $message = Message::where('id', $messageId)->first();
        return view('auth.messages.show', compact('message'));
    }
}
