<?php

namespace App\Http\Controllers;

use App\Record;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use Notifiable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderby('name', 'asc')->get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->except('password'));
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect('/')->with('success', 'Korisnik kreiran.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $confirms = Record::where('user_id','=',Auth::user()->id)->where('confirm','=',1)->get();
        $notconfirms=Record::where('user_id','=',Auth::user()->id)->where('confirm','=',0)->get();
        $donates=Record::where('user_id','=',Auth::user()->id)->where('donor','=',1)->get();
        return view('user.show',array('user'=>$user,'confirms'=>$confirms,'notconfirms'=>$notconfirms,'donates'=>$donates));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', ['user'=>$user]);
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
        $user=User::find($id);
        if ($request->filled('password')) {
            $user->fill(array_filter($request->except('password'), 'strlen'));
            $user->password = bcrypt($request['password']);
        } else {
            $user->fill(array_filter($request->all(), 'strlen'));
        }
        $user->save();

        return redirect('/')->with('success','Korisnik ažuriran.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/')->with('danger', 'Korisnik izbrisan.');
    }
}
