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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Services</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">Institute</a>
                            <a class="dropdown-item" href="#">Departments</a>
                            <a class="dropdown-item" href="#">Services</a>
                        </div>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Doctors</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="#">Find Doctors</a>
                            <a class="dropdown-item" href="#">Practitioner</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
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
