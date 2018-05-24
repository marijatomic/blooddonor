@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-body ">
                        <form method="POST" action="{{ route('users_create') }}">
                            @csrf

                            <h3 class="row col-lg-10">Dodavanje novih korisnika</h3>
                            <br>
                            <div class="col-lg-8 offset-md-2">

                                <!-- ime i prezime -->
                                <div class="form-group">
                                    <div >
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"
                                              style="background-color: #f8f8f8"><i class="lni-user"
                                                                                   style="background-color: #f8f8f8; font-size: 36px; color:#d9534f;"></i></span>
                                            </div>
                                            <input type="text" class="form-control noborder" id="inputName" name="name"
                                                   placeholder="Ime i prezime" required>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 offset-md-2">
                                <!-- email-->
                                <div class="form-group">
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"
                                              style="background-color: #f8f8f8;"><i class="lni-envelope"
                                                                                    style="font-size: 36px; color:#d9534f;"></i></span>
                                            </div>
                                            <input type="email" class="form-control noborder" id="inputEmail"
                                                   name="email"
                                                   placeholder="Email" required>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 offset-md-2">
                                <!--password-->
                                <div class="form-group">
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"
                                              style="background-color: #f8f8f8;"><i class="lni-lock"
                                                                                    style="font-size: 36px; color:#d9534f;"></i></span>
                                            </div>
                                            <input type="password" class="form-control noborder" id="inputPassword"
                                                   name="password" placeholder="Lozinka" required>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 offset-md-2">
                                <!-- datum rođenja -->
                                <div class="form-group">
                                    <div >
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"
                                              style="background-color: #f8f8f8"><i class="lni-user"
                                                                                   style="background-color: #f8f8f8; font-size: 36px; color:#d9534f;"></i></span>
                                            </div>
                                            <input type="text" class="form-control noborder" id="inputDate" name="birth_date"
                                                   placeholder="Datum rođenja" required>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 offset-md-2">
                                <!-- adresa-->
                                <div class="form-group">
                                    <div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"
                                              style="background-color: #f8f8f8;"><i class="lni-envelope"
                                                                                    style="font-size: 36px; color:#d9534f;"></i></span>
                                            </div>
                                            <input type="text" class="form-control noborder" id="inputAddress"
                                                   name="address"
                                                   placeholder="Adresa" required>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 offset-md-2">
                                <!-- Telefon-->
                                <div class="form-group">
                                    <div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"
                                              style="background-color: #f8f8f8;"><i class="lni-envelope"
                                                                                    style="font-size: 36px; color:#d9534f;"></i></span>
                                            </div>
                                            <input type="text" class="form-control noborder" id="inputPhone"
                                                   name="phone"
                                                   placeholder="Broj telefona" required>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 offset-md-2">
                                <!-- krvna grupa -->
                                <div class="form-group">
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                               <span class="input-group-text" id="basic-addon1" for="select"
                                                     style="background-color: #f8f8f8;"><i class="lni-home"
                                                                                           style="font-size: 36px; color:#d9534f;"></i></span>
                                            </div>
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
                                </div>
                            </div>

                            <div class="col-lg-8 offset-md-2">
                                <!-- spol -->
                                <div class="form-group">
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                               <span class="input-group-text" id="basic-addon1" for="select"
                                                     style="background-color: #f8f8f8;"><i class="lni-home"
                                                                                           style="font-size: 36px; color:#d9534f;"></i></span>
                                            </div>
                                            <select class="form-control noborder" id="select" name="sex"
                                                    style="height: 52px; background-color: #f8f8f8;">
                                                <option value="#">Odaberite spol
                                                </option>
                                                <option value="žensko">Žensko</option>
                                                <option value="muško">Muško</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-8 offset-md-2">
                                <!-- tip korisnika -->
                                <div class="form-group">
                                    <div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                               <span class="input-group-text" id="basic-addon1" for="select"
                                                     style="background-color: #f8f8f8;"><i class="lni-home"
                                                                                           style="font-size: 36px; color:#d9534f;"></i></span>
                                            </div>
                                            <select class="form-control noborder" id="select" name="type"
                                                    style="height: 52px; background-color: #f8f8f8;">
                                                <option value="#">Odaberite tip korisnika
                                                </option>
                                                <option value="trazitelj">Tražitelj</option>
                                                <option value="darivatelj">Darivatelj</option>
                                                <option value="transfuziologija">Transfuziologija</option>
                                                <option value="admin">Admin</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary btn-block"
                                            style="background-color: #D9534F; border-color: #D9534F; margin-bottom: 57px;">
                                        {{ __('Spremi') }}
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