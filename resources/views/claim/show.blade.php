<!doctype html>
<html lang="en">
<head>
    <title>Colorlib Medi+</title>
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
                        <a href="#" class="cta-btn" data-toggle="modal" data-target="#modalAppointment">Make an
                            Appointment</a></p>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">Medi<span>+</span> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
                    aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Services</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">Institute</a>
                            <a class="dropdown-item" href="#">Departments</a>
                            <a class="dropdown-item" href="services.html">Services</a>
                        </div>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="doctors.html" id="dropdown05" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Doctors</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="doctors.html">Find Doctors</a>
                            <a class="dropdown-item" href="#">Practitioner</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.html">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- END header -->


<section class="home-slider inner-page owl-carousel">
    <div class="slider-item" style="background-image: url('assets1/img/slider-2.jpg');">

        <div class="container">
            <div class="row slider-text align-items-center">
                <div class="col-md-7 col-sm-12 element-animate">
                    <h1>PREGLED ZAHTJEVA ZA DONIRANJE KRVI</h1>
                    <p></p>
                </div>
            </div>
        </div>

    </div>

</section>
<!-- END slider -->


<section class="section bg-light custom-tabs">
    <div class="container">
        <div class="row">

            <div class="col-md-4 border-right element-animate" data-animate-effect="fadeInLeft">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                       aria-controls="v-pills-home" aria-selected="true"><span>01</span> Podaci o pacijentima</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                       aria-controls="v-pills-profile" aria-selected="false"><span>02</span> Podaci o tražitelju </a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                       aria-controls="v-pills-messages" aria-selected="false"><span>03</span> Potvrdili</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                       aria-controls="v-pills-settings" aria-selected="false"><span>04</span> Odbili</a>
                    @if($claim->user_id != Auth::user()->id)
                        @foreach($records as $record)
                            {{$x=false}}
                            @if($record->user_id == Auth::user()->id)
                                {{$x=true}}
                            @endif
                        @endforeach
                        @if($x==false)
                            <form class="form-horizontal col-lg-6"
                                  action="{{route('confirm')}}/{{$claim->id}}"
                                  method="POST">
                                {{csrf_field()}}
                                <fieldset>
                                    <button type="submit" class="btn btn-default"
                                            style="width: 120px;">
                                        Potvrdi
                                    </button>
                                </fieldset>
                            </form>
                            <form class="form-horizontal col-lg-6"
                                  action="{{route('reject')}}/{{$claim->id}}"
                                  method="POST">
                                {{csrf_field()}}
                                <fieldset>
                                    <button type="submit" class="btn btn-default"
                                            style="width: 120px;">
                                        Odbij
                                    </button>
                                </fieldset>
                            </form>
                        @endif
                    @endif
                </div>

            </div>
            <div class="col-md-1"></div>
            <div class="col-md-7 element-animate" data-animate-effect="fadeInLeft">

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                         aria-labelledby="v-pills-home-tab">
                        <span class="icon flaticon-hospital"></span>
                        <h2 class="text-primary">Pacijent</h2>
                        <p class="lead">{{$claim->patient_name}}</p>
                        <p class="lead">{{$claim->patient_birth}}</p>
                        <p class="lead">{{$claim->patient_address}}</p>
                        <p class="lead">{{$claim->patient_phone}}</p>
                        <p class="lead">{{$claim->patient_blood}}</p>
                        <p class="lead">{{$claim->patient_sex}}</p>
                        <p class="lead">{{$claim->description}}</p>


                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                         aria-labelledby="v-pills-profile-tab">
                        <span class="icon flaticon-first-aid-kit"></span>
                        <h2 class="text-primary">Tražitelj donacije</h2>
                        <p class="lead">{{$claim->user->name}}</p>
                        <p class="lead">{{$claim->user->email}}</p>
                        <p class="lead">{{$claim->user->birth_date}}</p>
                        <p class="lead">{{$claim->user->address}}</p>
                        <p class="lead">{{$claim->user->phone}}</p>
                        <p class="lead">{{$claim->user->blod_type}}</p>
                        <p class="lead">{{$claim->user->sex}}</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                         aria-labelledby="v-pills-messages-tab">
                        <span class="icon flaticon-hospital-bed"></span>
                        <h2 class="text-primary">Potvrdili zahtjev</h2>

                        <div class="list-group">

                            @foreach($records as $record)
                                @if($record->confirm == 1)
                                    <a href="#"
                                       class="list-group-item list-group-item-action flex-column align-items-start ">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5>{{$record->user->name}}</h5>
                                        </div>
                                    </a>
                                @endif
                            @endforeach

                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                         aria-labelledby="v-pills-settings-tab">
                        <span class="icon flaticon-doctor"></span>
                        <h2 class="text-primary">Odbili zahtjev</h2>
                        <div class="list-group">
                            @foreach($records as $record)
                                @if($record->confirm == 0)
                                    <a href="#"
                                       class="list-group-item list-group-item-action flex-column align-items-start ">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5>{{$record->user->name}}</h5>
                                        </div>
                                    </a>
                                @endif
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END section -->


<a href="#" class="cta-link element-animate" data-animate-effect="fadeIn" data-toggle="modal"
   data-target="#modalAppointment">
    <span class="sub-heading">Ready to Visit?</span>
    <span class="heading">Make an Appointment</span>
</a>
<!-- END cta-link -->

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row mb-5 element-animate">
            <div class="col-md-3 mb-5">
                <h3>Services</h3>
                <ul class="footer-link list-unstyled">
                    <li><a href="#">Find a doctor</a></li>
                    <li><a href="#">Urgent Care</a></li>
                    <li><a href="#">Emergency Care</a></li>
                    <li><a href="#">Procedures &amp; Treatments</a></li>
                    <li><a href="#">Online Services</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-5">
                <h3>Latest News</h3>
                <ul class="footer-link list-unstyled">
                    <li><a href="#">News &amp; Press Releases</a></li>
                    <li><a href="#">Health Care Professional News</a></li>
                    <li><a href="#">Events &amp; Conferences</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-5">
                <h3>About</h3>
                <ul class="footer-link list-unstyled">
                    <li><a href="#">About The Hospital</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Accreditations &amp; Awards</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Feedback</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-5">
                <h3>Location &amp; Contact</h3>
                <p class="mb-5">134 Street Name, City Name Here, United States</p>

                <h5 class="text-uppercase mb-3 h6 text-white">Email</h5>
                <p class="mb-5"><a href="mailto:info@yourdomain.com">info@yourdomain.com</a></p>

                <h5 class="text-uppercase mb-3 h6 text-white">Phone</h5>
                <p>+1 24 435 3533</p>

            </div>
        </div>

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
                <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group">
                        <label for="appointment_name" class="text-black">Full Name</label>
                        <input type="text" class="form-control" id="appointment_name">
                    </div>
                    <div class="form-group">
                        <label for="appointment_email" class="text-black">Email</label>
                        <input type="text" class="form-control" id="appointment_email">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="appointment_date" class="text-black">Date</label>
                                <input type="text" class="form-control" id="appointment_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="appointment_time" class="text-black">Time</label>
                                <input type="text" class="form-control" id="appointment_time">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="appointment_message" class="text-black">Message</label>
                        <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
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