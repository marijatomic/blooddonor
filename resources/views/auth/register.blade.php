@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row justify-content-center ">
                    <img src="{{ asset('assets1/img/logo.png') }}" width="170px;" height="170px;"
                         style="margin-bottom: 35px; margin-top: 35px;">

                </div>
                <div class="row justify-content-center">
                    <h3 style="color: #d62220">REGISTRACIJA</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row justify-content-center">

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Ime i prezime">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center" >


                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Lozinka">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Potvrdite lozinku">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <input id="birth_date" type="text" class="form-control" name="birth_date" value="{{ old('birth_date') }}" required autofocus placeholder="Datum rođenja">

                                @if ($errors->has('birth_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus placeholder="Adresa">

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus placeholder="Broj telefona">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <select class="form-control noborder" id="select" name="blod_type"
                                        style="height: 52px; background-color: #f8f8f8;">
                                    <option value="#">Odaberite krvnu grupu
                                    </option>
                                    <option value="A+">A+</option>
                                    <option value="0+">0+</option>
                                    <option value="B+">B+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="A-">A-</option>
                                    <option value="0-">0-</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <select class="form-control noborder" id="select" name="sex"
                                        style="height: 52px; background-color: #f8f8f8;">
                                    <option value="#">Odaberite spol
                                    </option>
                                    <option value="žensko">Žensko</option>
                                    <option value="muško">Muško</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">


                            <div class="col-md-6">
                                <select class="form-control noborder" id="select" name="type"
                                        style="height: 52px; background-color: #f8f8f8;">
                                    <option value="#">Odaberite tip korisnika
                                    </option>
                                    <option value="darivatelj">Darivatelj</option>
                                    <option value="trazitelj">Tražitelj</option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-block" style="background-color: #d62220; color:white;">
                                    {{ __('Registriraj se') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
