@extends('layouts.app')

@section('content')
    @if($records)
        <div class="container" style="margin-top: 50px;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3 class="row">Prikaz potvrda</h3>
                    <div class="card ">

                        <div class="card-body ">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Potvrdio</th>
                                    <th>Vrijeme</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($records as $record)

                                    <tr>
                                        <td>{{$record->id}}</td>
                                        <td>{{$record->user->name}}</td>
                                        <td>{{$record->created_at}}</td>
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