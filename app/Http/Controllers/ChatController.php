<?php

namespace App\Http\Controllers;

use App\Claim;
use App\Conversation;
use App\Message;
use App\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Chat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //vraća sve razgovore prijavljenog korisnika
    public function getConversations()
    {
        /*$records=Record::where('user_id','=',Auth::user()->id)->first();
        $claims=Claim::where('user_id','=',Auth::user()->id)->first();*/
        $conversations=Conversation::where('userRequest_id','=',Auth::user()->id)->orWhere('donor_id','=',Auth::user()->id)->get();


        foreach ($conversations as $conversation) {

            $message = Message::where('conversation_id','=',$conversation->id)->orderBy('id','desc')->first();
//            $users = [];

//            foreach ($participants as $participant) {
//                array_push($users, User::find($participant->user_id));
//            }

//            $conversation->participants = $users;
            $conversation->message = $message;
        }
        return $conversations;
    }

    public  function getMessages($conversation_id){
        return Message::where('conversation_id', '=', $conversation_id)->get();
    }

    public function createMessage(Request $request){
        $message = new Message();
        $message->content = $request->content_msg;
        $message->conversation_id = $request->conversation_id;
        $message->created_at = $request->created_at;
        $message->sender_id = Auth::user()->id;
        $message->save();

        $conversation = Conversation::find($request->conversation_id);
        $conversation->last_message_time = $request->created_at;
        $conversation->save();

        return self::getMessages($request->conversation_id);
    }
}
