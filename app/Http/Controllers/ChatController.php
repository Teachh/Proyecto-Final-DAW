<?php
namespace App\Http\Controllers;

use App\Chat;
use App\Events\ChatEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('chat.chat');
    }

    public function fetchAllMessages()
    {
    	return Chat::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
    	$chat = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

    	broadcast(new ChatEvent($chat->load('user')))->toOthers();

    	return ['status' => 'success'];
    }
}
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use App\Events\MessageSent;
//use App\Message;
//use Illuminate\Support\Facades\Auth;
//
//class ChatsController extends Controller
//{
//
//
//    public function __construct()
//    {
//    $this->middleware('auth');
//    }
//
//    /**
//     * Show chats
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//    return view('chat.chat');
//    }
//
//    /**
//     * Fetch all messages
//     *
//     * @return Message
//     */
//    public function fetchMessages()
//    {
//    return Message::with('user')->get();
//    }
//
//    //remember to use
//
//    /**
//     * Persist message to database
//     *
//     * @param  Request $request
//     * @return Response
//     */
//    public function sendMessage(Request $request)
//    {
//    $user = Auth::user();
//
//    $message = $user->messages()->create([
//        'message' => $request->input('message')
//    ]);
//
//    broadcast(new MessageSent($user, $message))->toOthers();
//
//    return ['status' => 'Message Sent!'];
//    }
//}
//