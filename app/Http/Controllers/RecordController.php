<?php

namespace App\Http\Controllers;

use App\Claim;
use App\Conversation;
use App\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::orderby('id', 'desc')->get();
        return view('record.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new Record();
        $record->fill($request->all());
        $record->save();

        $claim = Claim::find($record->claim_id)->get();

        $conversation = new Conversation();
        $conversation->title = $claim->user_id . '&' . $record->user_id;
        $conversation->userRequest_id = $claim->user_id;
        $conversation->donor_id = $request->user_id;
        return redirect('/')->with('success', 'Zahtjev kreiran.');



    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Record::find($id);
        return view('record.show', ['record' => $record]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Record::find($id);
        return view('record.edit', ['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Record::find($id);
        $record->fill($request->all());
        $record->save();

        return redirect('/')->with('success', 'Ažurirano.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Record::find($id);
        $record->delete();
        return redirect('/')->with('danger', 'Izbrisano.');
    }
}
