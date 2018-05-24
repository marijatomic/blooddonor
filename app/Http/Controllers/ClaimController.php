<?php

namespace App\Http\Controllers;

use App\Claim;
use App\Conversation;
use App\Record;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claims = Claim::orderby('id', 'desc')->get();
        return view('claim.index', ['claims' => $claims]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('claim.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $claim = new Claim();
        $claim->fill($request->all());
        $claim->save();
        return redirect('/')->with('success', 'Zahtjev kreiran.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $claim = Claim::find($id);

        $records = Record::where('request_id','=',$claim->id)->get();
        return view('claim.show',['claim'=>$claim],['records'=>$records]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $claim = Claim::find($id);
        return view('claim.edit', ['claim'=>$claim]);
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
        $claim = Claim::find($id);
        $claim->fill($request->all());
        $claim->save();

        return redirect('/')->with('success','Ažurirano!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $claim = Claim::find($id);
        $claim->delete();
        return redirect('/')->with('danger', 'Izbrisano.');
    }
    public function userCreate()
    {
        $users = User::all();

        return view('home1.index', ['users' => $users]);
    }

    public function userStore(Request $request)


    {
        $claim = new Claim();
        $claim->fill($request->except(['user_id']));
        $claim->user_id= Auth::user()->id;
        $claim->save();

        return redirect('/')->with('success', 'Kreirano');

    }

    public function confirmClaim($id){
        $record = new Record();
        $record->confirm=1;
        $record->donor=0;
        $record->user_id=Auth::user()->id;
        $record->request_id=$id;
        $record->save();

        $claim=Claim::find($id);
        $conversation=new Conversation();
        $conversation->title=$claim->user->name . '+' . Auth::user()->name;
        $conversation->last_message_time=Carbon::now();
        $conversation->userRequest_id=$claim->user->id;
        $conversation->donor_id=Auth::user()->id;
        $conversation->save();

        return redirect()->back()->with('success', 'Potvrdili ste zahtjev.');
    }

    public function rejectClaim($id){
        $record = new Record();
        $record->confirm=0;
        $record->donor=0;
        $record->user_id=Auth::user()->id;
        $record->request_id=$id;
        $record->save();


        return redirect()->back()->with('success', 'Odbili ste zahtjev.');
    }


}
