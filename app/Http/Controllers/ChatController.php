<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function myChats($id){
        $chatRooms = ChatRoom::where('ad_owner', $id)->orWhere('enquirer', $id)->get();
        return view('user.my-chats', compact('chatRooms'));
    }

    public function messages(Request $request, $roomId){
        $message = ChatMessage::where('chat_room_id', $roomId)
        ->with('user')
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('chat.room', compact('messages'));
    }

    public function newMessage(Request $request){
        $newMessage = new ChatMessage;
        $newMessage->user_id = Auth::id();
        $newMessage->chat_room_id = $request->roomId;
        $newMessage->message = $request->message;
        $newMessage->save();
        $message = ChatMessage::latest()->first();
        return response()->json([
            'data'=>$message,
        ]); 
    }

    public function createRoom($ad_owner, $room, $user){
        // $roomExisted = ChatRoom::where('ad_owner', $ad_owner)->where('for_room', $room)->where('enquirer', $user)->first();
        // if ($roomExisted) {
        //     return redirect()->back()->with('message','Chat for this ad exists. Go to your inbox to chat.');
        // }else{
            $newChatRoom = new ChatRoom;
            $newChatRoom->ad_owner = $ad_owner;
            $newChatRoom->enquirer = $user;
            $newChatRoom->for_room = $room;
            $newChatRoom->save();
            $createdChatRoom = ChatRoom::latest()->first();
            return view('chat.room', compact('createdChatRoom'));
        // }
    }
}
