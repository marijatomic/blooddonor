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
                <div class="col-md-6 col-sm-6 col-7 text-right">
                    <p class="mb-0">
                        <a href="#" class="cta-btn" data-toggle="modal" data-target="#modalAppointment">ZAHTJEV</a></p>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{url('/index')}}">Blood Donor</a>
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
                                        <br><div class="d-flex w-100 justify-content-between" style="text-align: center;">
                                            Nema novih obavijesti.
                                        </div><br>
                                    </div>
                                @endforelse
                            </a>

                            <a class="dropdown-item" href="{{route('markRead')}}">Označi sve kao pročitano</a>
                        </div>
                    </li>
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Prijava') }}</a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('register') }}">{{ __('Registracija') }}</a></li>
                        @else
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link " data-toggle="dropdown" role="button"
                                   aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu row nav-item" style="width:350px;">
                                    <ol class="col-md-12">
                                        <div class="col-sm-12" style="padding: 0px !important;">


                                            <div class="col-md-6"
                                                 style="padding: 0px !important;">
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                                   class="btn btn-default btn-block btn-lg"
                                                ><i
                                                            class="fa fa-power-off"></i>
                                                    Odjavi se
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}"
                                                      method="POST"
                                                      style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>


                                        </div>
                                    </ol>
                                </ul>
                            </li>
                            @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- END header -->

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('assets1/img/slider-2.jpg');">

        <div class="container">
            <div class="row slider-text align-items-center">
                <div class="col-md-7 col-sm-12 element-animate">
                    <h1>Darivanjem krvi možeš spasiti život!</h1>
                </div>
            </div>
        </div>

    </div>

    <div class="slider-item" style="background-image: url('assets1/img/slider-1.jpg');">
        <div class="container">
            <div class="row slider-text align-items-center">
                <div class="col-md-7 col-sm-12 element-animate">
                    <h1></h1>
                    <p></p>
                </div>
            </div>
        </div>

    </div>

</section>
<!-- END slider -->


<section class="container home-feature mb-5">
    <div class="row">
        <div class="col-md-4 p-0 one-col element-animate">
            <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
                <span class="icon flaticon-hospital-bed"></span>
                <h2>ZAHTJEVI ZA DONIRANJE</h2>
                <p>Nudimo mogućnosti kreiranja zahtjeva za donaciju krvi. Hitno morate pronaći dobrovoljne darivatelje krvi
                a nemate dovoljno vremena, na pravom ste mjestu.</p>
            </div>
            <a href="{{route('claims')}}" class="btn-more">PREGLEDAJ</a>
        </div>
        <div class="col-md-4 p-0 two-col element-animate">
            <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
                <span class="icon flaticon-first-aid-kit"></span>
                <h2>DARIVATELJI</h2>
                <p>Najbrži način za pronalazak dobrovoljnih darivatelja iz naše baze podataka. Možda želite postati dobrovoljni darivatelj?
                    Prijavite se i donirajte krv, jer krv je život.</p>
            </div>
            <a href="{{route('darivatelji')}}" class="btn-more">PREGLEDAJ</a>
        </div>
        <div class="col-md-4 p-0 three-col element-animate">
            <div class="col-inner p-xl-5 p-lg-5 p-md-4 p-sm-4 p-4">
                <span class="icon flaticon-hospital"></span>
                <h2>OSOBLJE</h2>
                <p>Želite kontaktirati stručno osobolje sa odjela transfuzologije. Ovo je mjesto za brz pronalazak informacija koje vma trebaju.</p>
            </div>
            <a href="#" class="btn-more">PREGLEDAJ</a>
        </div>
    </div>
</section>
<!-- END section -->

<section class="section stretch-section">
    <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-8 text-center mb-5">
                <a href="#"><h2 class="text-uppercase heading border-bottom mb-4">ZAŠTO IZABRATI NAS?</h2></a>
                <p class="mb-0 lead"></p>
            </div>
        </div>
        <div class="row align-items-center">

            <div class="col-md-12 pl-md-5 pl-0 element-animate" data-animate-effect="fadeInLeft">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="media d-block media-feature text-center">
                            <span class="icon flaticon-hospital"></span>
                            <div class="media-body">
                                <h3 class="mt-0 text-black">Zahtjevi</h3>
                                <p>Aktivni zahtjevi na jednom mjestu, uvijek pristupačni.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="media d-block media-feature text-center">
                            <span class="icon flaticon-first-aid-kit"></span>
                            <div class="media-body">
                                <h3 class="mt-0 text-black">Darivatelji</h3>
                                <p>Dobrovoljni darivatelji krvi na jednom mjestu.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="media d-block media-feature text-center">
                            <span class="icon flaticon-hospital-bed"></span>
                            <div class="media-body">
                                <h3 class="mt-0 text-black">Opisan proces darivanja</h3>
                                <p>Informacije kako postati darivatelj ili zatražiti krv.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="media d-block media-feature text-center">
                            <span class="icon flaticon-doctor"></span>
                            <div class="media-body">
                                <h3 class="mt-0 text-black">Stručno osoblje</h3>
                                <p>Pristupačno i dostupno stručno osoblje.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END section -->


<section class="cover_1" style="background-image: url('assets1/img/bg_1.jpg');">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-10">
                <h2 class="heading element-animate"></h2>
                <p class="sub-heading element-animate mb-5"></p>
            </div>
        </div>
    </div>
</section>
<!-- END section -->

<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-8 text-center mb-5">
                <h2 class="text-uppercase heading border-bottom mb-4">AKTIVNI ZAHTJEVI</h2>
                <p class="mb-0 lead">Pregledajte aktivne zahtjeva za donacije krvi.</p>
            </div>
        </div>
        <div class="row element-animate">
            <div class="major-caousel js-carousel-2 owl-carousel">
                @if($claims)
                    @foreach($claims as $claim)
                        <div>
                            <div class="media d-block media-custom text-left">
                                <img src="{{asset('assets1/img/blood2.jpg')}}" alt="Image Placeholder"
                                     class="img-fluid">
                                <div class="media-body">
                                    <span class="meta-post">{{$claim->created_at}}</span>
                                    <h2 class="mt-0 text-black" style="color: #d9534f;"><a href="#" style="color: #d9534f;" >
                                          {{$claim->patient_name}}</a></h2>

                                        <p class="clearfix">Krvna grupa: {{$claim->patient_blood}}</p>

                                    <p class="clearfix">Opis: {{$claim->description}}</p>
                                    <p class="clearfix">
                                        <a href="{{route('claims')}}/{{$claim->id}}" class="float-left" style="color: #D9534F">PREGLEDAJ</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
            <!-- END slider -->
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
<!-- END footer -->


<!-- Modal -->
<div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointmentLabel">Zahtjev</h5>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="appointment_date" class="text-black">Krvna grupa</label>
                                <select id="inlineFormCustomSelect" name="patient_blood">
                                    <option selected>Odaberi</option>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="appointment_date" class="text-black">Spol</label>
                                <select id="inlineFormCustomSelect" name="patient_sex">
                                    <option selected>Odaberi</option>
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
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
</script>
</body>
</html>
