@extends('layouts.app')

@section('content')
    @if($users)
        <div class="container" style="margin-top: 50px;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3 class="row">Prikaz registriranih korisnika</h3>
                    <div class="card ">

                        <div class="card-body ">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ime i prezime</th>
                                    <th>E-mail</th>
                                    <th>Datum rođenja</th>
                                    <th>Adresa</th>
                                    <th>Telefon</th>
                                    <th>Krvna grupa</th>
                                    <th>Spol</th>
                                    <th>Tip korisnika</th>
                                    <th>Uredi</th>
                                    <th>Izbriši</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->birth_date}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->blod_type}}</td>
                                        <td>{{$user->sex}}</td>
                                        <td>{{$user->type}}</td>


                                        <td><a href="{{route('users_edit')}}/{{$user->id}}"
                                               class="btn btn-warning btn-xs">Uredi</a></td>
                                        <td><a href="{{route('users_delete')}}/{{$user->id}}"
                                               class="btn noborder btn-danger btn-xs">Izbriši</a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    @endif
@endsection