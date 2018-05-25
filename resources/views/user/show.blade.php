<!doctype html>
<html lang="en">
<head>
    <title>Blood Donor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300, 400, 700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets1/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/css/jquery.timepicker.css')}}">

    <link rel="stylesheet" href="{{asset('assets1/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/fonts/flaticon/font/flaticon.css')}}">


    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('assets1/css/style.css')}}">
</head>
<body>


<header role="banner">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-5">
                    <ul class="social list-unstyled">
                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
                @if(Auth::user())
                    <div class="col-md-6 col-sm-6 col-7 text-right">
                        <p class="mb-0">
                            <a href="#" class="cta-btn" data-toggle="modal" data-target="#modalAppointment">ZAHTJEV</a></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" style="padding-top: 0px !important; float: right;"><img
                        src="{{ asset('assets1/img/logo.png') }}" alt="logo img" width="70px" height="70px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
                    aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/')}}">Home</a>
                    </li>

                    @if(Auth::user())
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('chat')}}">Razgovori</a>
                        </li>
                    @endif

                    <!-- notification-->
                    @if (Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Notifikacije
                                @if(auth()->user()->unreadNotifications->count())
                                    <span class="badge" style="background-color: #d9534f; color:#fff;">
                                            {{count(auth()->user()->unreadNotifications)}}
                                        </span>
                                @endif</a>
                            <!-- notification body-->
                            <div class="dropdown-menu" aria-labelledby="dropdown05">
                                <h6><a class="dropdown-item " href="#" style="text-align: center;">NOTIFIKACIJE</a></h6>
                                <a class="dropdown-item" href="#">

                                    @forelse(auth()->user()->unreadNotifications as $notification)
                                        @include('layouts.notifications.'.snake_case(class_basename($notification->type)))
                                    @empty
                                        <div class="list-group col-lg-12"
                                             style="margin-bottom: 3px !important;">
                                            <br>
                                            <div class="d-flex w-100 justify-content-between" style="text-align: center;">
                                                Nema novih obavijesti.
                                            </div>
                                            <br>
                                        </div>
                                    @endforelse
                                </a>

                                <a class="dropdown-item" href="{{route('markRead')}}">Označi sve kao pročitano</a>
                            </div>
                        </li>
                    @endif

                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Prijava') }}</a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('register') }}">{{ __('Registracija') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <span
                                            class="caret"></span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04">
                                    <a class="dropdown-item" href="{{route('users')}}/{{Auth::user()->id}}"><i class="fa fa-user-circle-o"></i> Profil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Odjava</a>
                                    <form id="logout-form" action="{{ route('logout') }}"
                                          method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>

                            </li>

                            @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- END header -->


<div class="conteiner" style="margin:30px;">
    <div class="row">
        <div class="col-lg-3" style="margin-bottom:10px;">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <div class="row justify-content-center ">
                        <img src="{{ asset('assets1/img/logo.png') }}" width="100px;" height="100px;"
                             style="margin-bottom: 35px; margin-top: 35px;">
                    </div>
                    <div class="row">

                        <div class="col-lg-8">
                            <h3 style="color: #D9534F">{{$user->name}}</h3>
                        </div>

                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fa fa-envelope"
                                                   style="color: #D9534F; font-size: 20px;"></i> {{$user->email}}</li>
                    <li class="list-group-item"><i class="fa fa-calendar-check-o"
                                                   style="color: #D9534F; font-size: 20px;"></i> {{$user->birth_date}}
                    </li>
                    <li class="list-group-item"><i class="fa fa-location-arrow"
                                                   style="color: #D9534F; font-size: 20px;"></i> {{$user->address}}</li>
                    <li class="list-group-item"><i class="fa fa-phone"
                                                   style="color: #D9534F; font-size: 20px;"></i> {{$user->phone}}</li>
                    <li class="list-group-item"><i class="fa fa-tint"
                                                   style="color: #D9534F; font-size: 20px;"></i> {{$user->blod_type}}
                    </li>
                    <li class="list-group-item"><i class="fa fa-venus-mars"
                                                   style="color: #D9534F; font-size: 20px;"></i> {{$user->sex}}</li>
                    <li class="list-group-item"><i class="fa fa-list-ul"
                                                   style="color: #D9534F; font-size: 20px;"></i> {{$user->type}}</li>
                </ul>
                @if($user->id == Auth::user()->id)
                    <div class=" row justify-content-center col-lg-12">
                        <a href="{{route('users_edit')}}/{{$user->id}}"
                           class="btn btn-danger  btn-block">Uredi</a>
                    </div>
                @endif
            </div>
        </div>
        @if($user->type=='darivatelj')
            <div class="col-lg-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Potvrdio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Odbio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                           aria-controls="contact" aria-selected="false">Donirao</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table">
                            <thead>
                            <tr>

                                <th scope="col">Ime pacijenta</th>
                                <th scope="col">Datum rođenja pacijenta</th>
                                <th scope="col">Adresa pacijenta</th>
                                <th scope="col">Broj telefona pacijenta</th>
                                <th scope="col">Krvna grupa pacijenta</th>
                                <th scope="col">Spol pacijenta</th>
                                <th scope="col">Opis</th>
                                <th scope="col">Podnositelj zahtjeva</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($confirms as $confirm)
                                <tr>
                                    <td>{{$confirm->claim->patient_name}}</td>
                                    <td>{{$confirm->claim->patient_birth}}</td>
                                    <td>{{$confirm->claim->patient_address}}</td>
                                    <td>{{$confirm->claim->patient_phone}}</td>
                                    <td>{{$confirm->claim->patient_blood}}</td>
                                    <td>{{$confirm->claim->patient_sex}}</td>
                                    <td>{{$confirm->claim->description}}</td>
                                    <td>{{$confirm->claim->user->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table">
                            <thead>
                            <tr>

                                <th scope="col">Ime pacijenta</th>
                                <th scope="col">Datum rođenja pacijenta</th>
                                <th scope="col">Adresa pacijenta</th>
                                <th scope="col">Broj telefona pacijenta</th>
                                <th scope="col">Krvna grupa pacijenta</th>
                                <th scope="col">Spol pacijenta</th>
                                <th scope="col">Opis</th>
                                <th scope="col">Podnositelj zahtjeva</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rejects as $reject)
                                <tr>
                                    <td>{{$reject->claim->patient_name}}</td>
                                    <td>{{$reject->claim->patient_birth}}</td>
                                    <td>{{$reject->claim->patient_address}}</td>
                                    <td>{{$reject->claim->patient_phone}}</td>
                                    <td>{{$reject->claim->patient_blood}}</td>
                                    <td>{{$reject->claim->patient_sex}}</td>
                                    <td>{{$reject->claim->description}}</td>
                                    <td>{{$reject->claim->user->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table">
                            <thead>
                            <tr>

                                <th scope="col">Ime pacijenta</th>
                                <th scope="col">Datum rođenja pacijenta</th>
                                <th scope="col">Adresa pacijenta</th>
                                <th scope="col">Broj telefona pacijenta</th>
                                <th scope="col">Krvna grupa pacijenta</th>
                                <th scope="col">Spol pacijenta</th>
                                <th scope="col">Opis</th>
                                <th scope="col">Podnositelj zahtjeva</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($donates as $donate)
                                <tr>

                                    <td>{{$donate->claim->patient_name}}</td>
                                    <td>{{$donate->claim->patient_birth}}</td>
                                    <td>{{$donate->claim->patient_address}}</td>
                                    <td>{{$donate->claim->patient_phone}}</td>
                                    <td>{{$donate->claim->patient_blood}}</td>
                                    <td>{{$donate->claim->patient_sex}}</td>
                                    <td>{{$donate->claim->description}}</td>
                                    <td>{{$donate->claim->user->name}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        @elseif($user->type=='trazitelj')
            <div class="col-lg-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="zahtjevi-tab" data-toggle="tab" href="#zahtjevi" role="tab"
                           aria-controls="zahtjevi" aria-selected="true">Potvrdili</a>
                    </li>
                </ul>
                <div class="tab-pane fade show active" id="zahtjevi" role="tabpanel" aria-labelledby="zahtjevi-tab">

                    <table class="table">
                        <thead>
                        <tr>

                            <th scope="col">Ime pacijenta</th>
                            <th scope="col">Datum rođenja pacijenta</th>
                            <th scope="col">Adresa pacijenta</th>
                            <th scope="col">Broj telefona pacijenta</th>
                            <th scope="col">Krvna grupa pacijenta</th>
                            <th scope="col">Spol pacijenta</th>
                            <th scope="col">Opis</th>
                            <th scope="col">Potvrde</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($claims as $claim)
                            <tr>

                                <td>{{$claim->patient_name}}</td>
                                <td>{{$claim->patient_birth}}</td>
                                <td>{{$claim->patient_address}}</td>
                                <td>{{$claim->patient_phone}}</td>
                                <td>{{$claim->patient_blood}}</td>
                                <td>{{$claim->patient_sex}}</td>
                                <td>{{$claim->description}}</td>
                                <td><a href="{{route('records')}}/{{$claim->id}}"
                                       class="btn btn-warning btn-xs">Potvrde</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        @endif
    </div>

</div>
</div>

<footer class="site-footer" role="contentinfo">
    <div class="container">

        <div class="row pt-md-3 element-animate">
            <div class="col-md-12">
                <hr class="border-t">
            </div>
            <div class="col-md-6 col-sm-12 copyright">
                <p>&copy; 2018 Colorlib Medi+. Designed &amp; Developed by <a href="https://colorlib.com/">Colorlib</a>
                </p>
            </div>
            <div class="col-md-6 col-sm-12 text-md-right text-sm-left">
                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->

<!-- Modal -->
<div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointmentLabel">ZAHTJEV ZA DONACIJU KRVI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('claim_ucreate') }}">
                    @csrf
                    <div class="form-group">
                        <label for="appointment_name" class="text-black">Ime i prezime </label>
                        <input type="text" class="form-control" id="appointment_name" name="patient_name"
                               placeholder="Ime i prezime">
                    </div>
                    <div class="form-group">
                        <label for="appointment_name" class="text-black">Adresa pacijenta </label>
                        <input type="text" class="form-control" id="appointment_name" name="patient_address"
                               placeholder="Adresa">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="appointment_date" class="text-black">Broj telefona</label>
                                <input type="text" class="form-control" id="appointment_name" name="patient_phone"
                                       placeholder="Broj telefona">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="appointment_date" class="text-black">Datum rođenja</label>
                                <input type="text" class="form-control" id="appointment_date" name="patient_birth"
                                       placeholder="Datum rođenja">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="appointment_date" class="text-black">Krvna grupa</label>
                                <select id="inlineFormCustomSelect" name="patient_blood" class="col-md-12">
                                    <option selected>Odaberi krvnu grupu</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="0+">0+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="0-">0-</option>
                                    <option value="AB-">AB-</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="appointment_date" class="text-black">Spol</label>
                                <select id="inlineFormCustomSelect" name="patient_sex" class="col-md-12">
                                    <option selected>Odaberi spol</option>
                                    <option value="musko">Muško</option>
                                    <option value="zensko">Žensko</option>

                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="appointment_message" class="text-black">Opis</label>
                        <textarea name="description" id="appointment_message" class="form-control" cols="30" rows="10"
                                  placeholder="Opis"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Pošalji zahtjev" class="btn  btn-block" style="background-color: #D9534F; color:white;">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="{{asset('assets1/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets1/js/popper.min.js')}}"></script>
<script src="{{asset('assets1/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets1/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets1/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets1/js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('assets1/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets1/js/main.js')}}"></script>
</body>
</html>