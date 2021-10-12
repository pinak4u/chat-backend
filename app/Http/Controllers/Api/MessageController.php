<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class MessageController extends Controller
{
    public function createMessage(Request $request){
        $message = $request->message;
        if(isset($message)){
            $toUser = $request->toUser;
            return Message::create([
                'message'=>$message,
                'to_user'=>$toUser,
                'from_user'=>$request->user()->id,
            ]);
        }

    }

    public function loadAllMessageForUsers(Request $request,$toUser){
        $message1 =   Message::where(['to_user'=>$toUser, 'from_user'=>$request->user()->id])->get();
        $message2 =   Message::where(['to_user'=>$request->user()->id, 'from_user'=>$toUser])->get();
        $messageCollection =  collect($message1)->merge($message2)->sortBy('id');
        return $messageCollection->values()->all();
    }
}
