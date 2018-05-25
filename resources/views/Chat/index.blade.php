<!doctype html>
<html lang="en" ng-app="bazinga">
<head>
    <title>Blood Donor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300, 400, 700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets1/css/bootstrap.css')}}">


    <link rel="stylesheet" href="{{asset('assetsChat/css/chat_style.css')}}">


    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script src="https://use.fontawesome.com/45e03a14ce.js"></script>

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


    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('assets1/css/style.css')}}">
</head>
<body ng-controller="myCtrl" ng-init="init()">

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
                                    <a class="dropdown-item" href="{{route('users')}}/{{Auth::user()->id}}"><i
                                                class="fa fa-user-circle-o"></i> Profil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                                class="fa fa-power-off"></i> Odjava</a>
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
<div class="main_section" style="margin-top: 40px;">
    <div class="container">
        <div class="chat_container">
            <div class="col-lg-3 chat_sidebar">
                <div class="row justify-content-end">
                    <div id="custom-search-input" style="width: 100%;">
                        <div class="input-group col-lg-12">
                            <input type="text" class="  search-query form-control" placeholder="Conversation"/>
                            <button class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                    <div class="member_list" style="width: 100%;">
                        <ul class="list-unstyled">
                            <div ng-repeat="conv in conversations">
                                <li class="left clearfix " ng-click="selectConversation(conv)"
                                    ng-class="{'selected-conversation':conv.id == selectedConversation.id}"
                                    style=" margin-bottom: 3px; border: solid #c9cad2 1px;">
                                <span class="chat-img pull-left">
                                    <img src="{{asset('assetsChat\img\logo-blood-donor.png')}}" alt="User Avatar"
                                         class="img-circle">
                                </span>
                                    <div class="chat-body clearfix">
                                        <div class="header_sec">
                                            <strong class="primary-font"><%conv.title%></strong>
                                            <span class="pull-right"> <% conv.last_message_time%></span>
                                        </div>
                                        <div class="contact_sec">
                                            <strong class="primary-font"><%conv.message.content%></strong>
                                            {{--<span class="badge pull-right">3</span>--}}
                                        </div>
                                    </div>
                                </li>
                            </div>

                        </ul>
                    </div>
                </div>
            </div>
            <!--chat_sidebar-->


            <div class="col-sm-9 message_section">
                <div class="row">
                    <div class="new_message_head" style="padding: 22px;">
                        <div class="pull-left">
                            <h4><%selectedConversation.title%></h4>
                        </div>
                        <div class="pull-right">
                            <div class="dropdown">

                            </div>
                        </div>
                    </div><!--new_message_head-->

                    <div class="chat_area" id="message-content">
                        <div ng-repeat="msg in messages">
                            <ul class="list-unstyled">
                                <li class="left clearfix admin_chat" ng-if="msg.sender_id == {{Auth::user()->id}}">
                                <span class="chat-img1 pull-right">
                                    <img src="{{asset('assetsChat\img\logo-blood-donor.png')}}" alt="User Avatar"
                                         class="img-circle">
                                </span>
                                    <div class="chat-body1 clearfix">
                                        {{--<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>--}}
                                        <p style="color:#D9534F;"><% msg.content %></p>
                                        <div class="chat_time pull-right"><span><%msg.created_at%></span></div>
                                    </div>
                                </li>
                                <li class="left clearfix" ng-if="msg.sender_id != {{Auth::user()->id}}">
                                <span class="chat-img1 pull-left">
                                    <img src="{{asset('assetsChat\img\logo-blood-donor.png')}}" alt="User Avatar"
                                         class="img-circle">
                                </span>
                                    <div class="chat-body1 clearfix">
                                        {{--<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>--}}

                                        <p style="background-color: #d97971; color:white"><% msg.content %></p>
                                        <div class="chat_time pull-right"><span><%msg.created_at%></span></div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div><!--chat_area-->
                    <div class="message_write">
                        <input type="text"
                               class="form-control noborder"
                               placeholder="Napišite novu poruku"
                               ng-model="newMessage" ng-submit="sendNewMessage()"
                               style=""
                               ng-keypress="checkIfEnterKeyWasPressed($event)">
                        <div class="clearfix"></div>
                        <div class="chat_bottom">

                            <button class="pull-right btn " ng-click="sendNewMessage()"
                                    style="background-color: #D9534F; color:white">
                                Pošalji
                            </button>
                        </div>
                    </div>
                </div>
            </div> <!--message_section-->
        </div>
    </div>
</div>


<footer class="site-footer" role="contentinfo" style="margin-top: 50px;">
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
</body>
</html>

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
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

    <script>
        var API_CONVERSATIONS = '{{route('conversations1')}}';
        var API_NEW_MESSAGE = '{{route('create_message')}}';
        var API_USERS = '{{route('search_user')}}';
        (function () {
            angular.module("bazinga", [])
                .config(['$interpolateProvider', function ($interpolateProvider) {
                    $interpolateProvider.startSymbol('<%');
                    $interpolateProvider.endSymbol('%>');
                }])
                .controller("myCtrl", function ($scope, $http) {
                    var API_MESSAGES
                    var element = document.getElementById("message-content");
                    $scope.selectConversation = function (con) {
                        $scope.selectedConversation = con;
                        $scope.searchText1 = "";
                        API_MESSAGES = '{{ route('messages','')}}' + '/' + $scope.selectedConversation.id
                        $scope.getMessages();
                    }
                    $scope.init = function () {
                        // Ulazna točka aplikacije
//                            $scope.getMessages();
                        $scope.getConversations();
                        setInterval(function () {
                            $scope.getConversations();
                            $scope.getMessages();
                        }, 3000);
                        console.log('pozvanInit')
                    };


                    $scope.getMessages = function () {
                        $http({
                            method: 'GET',
                            url: API_MESSAGES
                        }).then(function successCallback(response) {
                            $scope.messages = response.data;
                        }, function errorCallback(response) {
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                        setTimeout(function () {
                            element.scrollTop = element.scrollHeight;
                        }, 100)
                    }


                    $scope.getConversations = function () {
                        $http({
                            method: 'GET',
                            url: API_CONVERSATIONS
                        }).then(function successCallback(response) {
                            $scope.conversations = response.data;
                            console.log($scope.conversations)
                        }, function errorCallback(response) {
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                    }

                    $scope.sendNewMessage = function () {
                        var date = new Date().toLocaleString('en-US', {hour12: false}).split(" ");
                        //razdvajanje na datum i vrijeme
                        var time = date[1];
                        var mdy = date[0];
                        // korigiranje dijelova za spremanje u bazu
                        mdy = mdy.split('/');
                        var month = parseInt(mdy[0]);
                        var day = parseInt(mdy[1]);
                        var year = parseInt(mdy[2]);
                        var formattedDate = year + '-' + month + '-' + day + ' ' + time;
                        console.log($scope.selectedConversation.id);
                        $newMessage = {
                            'content_msg': $scope.newMessage, 'conversation_id': $scope.selectedConversation.id
                        };
                        console.log($newMessage);
                        $http({
                            method: 'POST',
                            url: API_NEW_MESSAGE,
                            data: JSON.stringify($newMessage)
                        }).then(function successCallback(response) {

                            $scope.messages = response.data;
                            console.log($scope.messages);
                            $scope.getConversations();
                            setTimeout(function () {
                                element.scrollTop = element.scrollHeight;
                            }, 100)
                        }, function errorCallback(response) {
                            console.log("greška prilokom slanja poruke!")
                            if ($scope.newMessage == "") {
                                alert("Morate unijeti poruku!")
                            }
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });

                        $scope.newMessage = "";
                    }


                    $scope.getUsers = function () {
                        $http({
                            method: 'GET',
                            url: API_USERS
                        }).then(function successCallback(response) {
                            $scope.users = response.data;

                            {{--$scope.optionsList = response.data.filter(function (x) {--}}
                            {{--if (x.id == {{Auth::user()->id}})--}}
                            {{--return false;--}}

                            {{--return true;--}}
                            {{--})--}}


                        }, function errorCallback(response) {
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                    }

                });
        })();
    </script>

