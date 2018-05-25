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
                        <a class="nav-link active" href="{{url('/index')}}">Home</a>
                    </li>

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


<!-- END slider -->


<section class="section bg-light custom-tabs">
    <div class="container">
        <div class="row">

            <div class="col-md-4 border-right element-animate" data-animate-effect="fadeInLeft">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                       aria-controls="v-pills-home" aria-selected="true">1 PACIJENT</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                       aria-controls="v-pills-profile" aria-selected="false">2 ZAHTJEV PODNOSI </a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                       aria-controls="v-pills-messages" aria-selected="false">3 POTVRDILI</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                       aria-controls="v-pills-settings" aria-selected="false">4 ODBILI</a>

                </div>

            </div>
            <div class="col-md-1"></div>
            <div class="col-md-7 element-animate" data-animate-effect="fadeInLeft">

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                         aria-labelledby="v-pills-home-tab">
                        <h2 class="lead" style="color: #D9534F">{{$claim->patient_name}}</h2>
                        <div class="row">
                            <p class="col-md-6" style="color: #D9534F">Datum rođenja:
                            <p class="lead">   {{$claim->patient_birth}}</p></p>
                            <p class="col-md-6" style="color: #D9534F">Spol: </p>
                            <p class="lead">   {{$claim->patient_sex}}</p>
                        </div>

                        <div class="row">
                            <p class="col-md-6" style="color: #D9534F">Adresa:
                            <p class="lead">   {{$claim->patient_address}}</p></p>
                            <p class="col-md-6" style="color: #D9534F">Broj telefona: </p>
                            <p class="lead">   {{$claim->patient_phone}}</p>
                        </div>

                        <div class="row">
                            <p class="col-md-6" style="color: #D9534F">Krvna grupa:
                            <p class="lead">   {{$claim->patient_blood}}</p></p>
                            <p class="col-md-6" style="color: #D9534F">Opis: </p>
                            <p class="lead">   {{$claim->description}}</p>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                         aria-labelledby="v-pills-profile-tab">

                        <h2 class="lead" style="color: #D9534F">{{$claim->user->name}}</h2>

                        <div class="row">
                            <p class="col-md-6" style="color: #D9534F">Email:
                            <p class="lead">  {{$claim->user->email}}</p></p>

                        </div>
                        <div class="row">
                            <p class="col-md-6" style="color: #D9534F">Datum rođenja:
                            <p class="lead">  {{$claim->user->birth_date}}</p></p>
                            <p class="col-md-6" style="color: #D9534F">Spol: </p>
                            <p class="lead">   {{$claim->user->sex}}</p>
                        </div>

                        <div class="row">
                            <p class="col-md-6" style="color: #D9534F">Adresa:
                            <p class="lead">   {{$claim->user->address}}</p></p>
                            <p class="col-md-6" style="color: #D9534F">Broj telefona: </p>
                            <p class="lead">   {{$claim->user->phone}}</p>
                        </div>

                        <div class="row">
                            <p class="col-md-6" style="color: #D9534F">Krvna grupa:
                            <p class="lead">   {{$claim->user->blod_type}}</p></p>
                            <p class="col-md-6" style="color: #D9534F">Uloga: </p>
                            <p class="lead">   {{$claim->user->type}}</p>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                         aria-labelledby="v-pills-messages-tab">
                        <h2 class="lead" style="color: #D9534F">Potvrdili zahtjev</h2>
                        <div class="list-group row justify-content-center">
                            @if(Auth::user())
                                @foreach($records as $record)
                                    @if($record->confirm == 1)
                                        <a href=""
                                           class="list-group-item list-group-item-action flex-column align-items-start "
                                           style="background-color: transparent; border:none;">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5>{{$record->user->name}}</h5>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                         aria-labelledby="v-pills-settings-tab">
                        <h2 class="lead" style="color: #D9534F">Odbili zahtjev</h2>
                        <div class="list-group row justify-content-center">
                            @if(Auth::user())
                                @foreach($records as $record)
                                    @if($record->confirm == 0)
                                        <a href=""
                                           class="list-group-item list-group-item-action flex-column align-items-start "
                                           style="background-color: transparent; border:none;">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5>{{$record->user->name}}</h5>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(Auth::user())
                @if($claim->user_id != Auth::user()->id)
                    @if($recordConfirm==false)
                        <div class="row col-lg-12" style="margin-top: 15px;">
                            <form class="form-horizontal col-md-2"
                                  action="{{route('confirm')}}/{{$claim->id}}"
                                  method="POST">
                                {{csrf_field()}}
                                <fieldset>
                                    <button type="submit" class=" btn btn-danger btn-block">
                                        Potvrdi
                                    </button>
                                </fieldset>
                            </form>
                            <form class="form-horizontal col-md-2"
                                  action="{{route('reject')}}/{{$claim->id}}"
                                  method="POST">
                                {{csrf_field()}}
                                <fieldset>
                                    <button type="submit" class="btn btn-danger btn-block"
                                    >
                                        Odbij
                                    </button>
                                </fieldset>
                            </form>
                        </div>

                    @endif
                @endif
            @endif

        </div>
    </div>


</section>
<!-- END section -->



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

<!-- Modal -->
<div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointmentLabel">Ispunite zahtjev za donacije krvi </h5>
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
                        <input type="submit" value="Pošalji zahtjev" class="btn btn-danger">
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