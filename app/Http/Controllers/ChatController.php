<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function myChats($id){
        $chatRooms = ChatRoom::where('ad_owner', $id)->orWhere('enquirer', $id)->latest()->get();
        return view('user.my-chats', compact('chatRooms'));
    }

    public function myRoom($id){
        $messages = ChatMessage::where('chat_room_id', $id)
        ->with('user')
        ->get();
        $roomId = $id;
        return view('chat.room', compact('roomId', 'messages'));
    }

    public function newMessage(Request $request){
        $newMessage = new ChatMessage;
        $newMessage->user_id = Auth::id();
        $newMessage->chat_room_id = $request->roomId;
        $newMessage->message = $request->message;
        $newMessage->save();
        $message = ChatMessage::where('chat_room_id','=',$request->roomId)->latest()->first();
        $user_name = $message->user->first_name.' '.$message->user->last_name;
        return response()->json([
            'data'=>$message,
            'name'=>$user_name,
        ]); 
    }

    public function createRoom($ad_owner, $ad, $user){
        $roomExisted = ChatRoom::where('ad_owner', $ad_owner)->where('for_ad', $ad)->where('enquirer', $user)->first();
        if ($roomExisted) {
            $id = auth()->user()->id;
            $chatRooms = ChatRoom::where('ad_owner', $id)->orWhere('enquirer', $id)->latest()->get();
            return view('user.my-chats', compact('chatRooms'));
        }else{
            $newChatRoom = new ChatRoom;
            $newChatRoom->ad_owner = $ad_owner;
            $newChatRoom->enquirer = $user;
            $newChatRoom->for_ad = $ad;
            $newChatRoom->save();
            $createdChatRoom = ChatRoom::latest()->first();
            return view('chat.room', compact('createdChatRoom'));
        }
    }
}
