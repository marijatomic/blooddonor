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

<section class="home-slider inner-page owl-carousel">
    <div class="slider-item" style="background-image: url('assets1/img/slider-1.jpg');">

        <div class="container">
            <div class="row slider-text align-items-center">
                <div class="col-md-7 col-sm-12 element-animate">
                    <h1 style="color: black">DARIVATELJI</h1>

                </div>
            </div>
        </div>

    </div>

</section>
<!-- END slider -->


<section class="section bg-light">
    <div class="container">
        <div class="row">
            @foreach($users as $user)
            <div class="col-md-3 element-animate">
                <div class="media d-block media-custom text-center">
                    <img src="{{asset('assets1/img/blood5.jpg')}}" alt="Image Placeholder" class="img-fluid">
                    <div class="media-body">
                        <a href="{{route('users')}}/{{$user->id}}"><h3 class="mt-0 text-black">{{$user->name}}</h3></a>
                        <h4 class="mt-0 text-black">{{$user->blod_type}}</h4>

                    </div>
                </div>
            </div>
@endforeach
        </div>


    </div>
</section>

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