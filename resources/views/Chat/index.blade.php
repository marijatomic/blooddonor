
<!doctype html>
<html lang="en" ng-app="bazinga">
<head>
    <title>Colorlib Medi+</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300, 400, 700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets1/css/bootstrap.css')}}">


    <link rel="stylesheet" href="{{asset('assetsChat/css/chat_style.css')}}">


    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script src="https://use.fontawesome.com/45e03a14ce.js"></script>


    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('assets1/css/style.css')}}">
</head>
<body ng-controller="myCtrl" ng-init="init()">
<div class="main_section">
    <div class="container">
        <div class="chat_container">
            <div class="col-lg-3 chat_sidebar">
                <div class="row">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="  search-query form-control" placeholder="Conversation" />
                            <button class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                    {{--<div class="dropdown all_conversation">--}}
                        {{--<button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--<i class="fa fa-weixin" aria-hidden="true"></i>--}}
                            {{--All Conversations--}}
                            {{--<span class="caret pull-right"></span>--}}
                        {{--</button>--}}
                        {{--<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">--}}
                            {{--<li><a href="#"> All Conversation </a>  <ul class="sub_menu_ list-unstyled">--}}
                                    {{--<li><a href="#"> All Conversation </a> </li>--}}
                                    {{--<li><a href="#">Another action</a></li>--}}
                                    {{--<li><a href="#">Something else here</a></li>--}}
                                    {{--<li><a href="#">Separated link</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Another action</a></li>--}}
                            {{--<li><a href="#">Something else here</a></li>--}}
                            {{--<li><a href="#">Separated link</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    <div class="member_list" >
                        <ul class="list-unstyled">
                            <div ng-repeat="conv in conversations">
                            <li class="left clearfix">

                                <div class="chat-body clearfix" >
                                    <div class="header_sec">
                                        <strong class="primary-font"><%conv.title%></strong>
                                        <strong class="pull-right"> <% conv.last_message_time%></strong>
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
                    <div class="new_message_head">
                        <div class="pull-left"><button><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Message</button></div><div class="pull-right"><div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>  Setting
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </div></div>
                    </div><!--new_message_head-->

                    <div class="chat_area">
                        <ul class="list-unstyled">
                            <li class="left clearfix admin_chat">
                                <span class="chat-img1 pull-right">
                                    <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                                </span>
                                <div class="chat-body1 clearfix">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                    <div class="chat_time pull-right">09:40PM</div>
                                </div>
                            </li>
                            <li class="left clearfix">
                                <span class="chat-img1 pull-left">
                                    <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                                </span>
                                <div class="chat-body1 clearfix">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                    <div class="chat_time pull-right">09:40PM</div>
                                </div>
                            </li>

                        </ul>
                    </div><!--chat_area-->
                    <div class="message_write">
                        <textarea class="form-control" placeholder="type a message"></textarea>
                        <div class="clearfix"></div>
                        <div class="chat_bottom">
                            <a href="#" class="pull-left upload_btn">
                                <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                Add Files
                            </a>
                            <a href="#" class="pull-right btn btn-success">
                                Send
                            </a>
                        </div>
                    </div>
                </div>
            </div> <!--message_section-->
        </div>
    </div>
</div>
</body>
</html>

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>

    <script>
        var API_CONVERSATIONS = '{{route('conversations1')}}';
        var API_USERS = '{{route('search_user')}}';
        (function () {
            angular.module("bazinga", [])
                .config(['$interpolateProvider', function ($interpolateProvider) {
                    $interpolateProvider.startSymbol('<%');
                    $interpolateProvider.endSymbol('%>');
                }])
                .controller("myCtrl", function ($scope, $http) {
                $scope.init = function () {
                    // Ulazna točka aplikacije
//                        $scope.getMessages();
                        $scope.getConversations();
//                        setInterval(function () {
//                            $scope.getConversations();
//                            $scope.getMessages();
//                        }, 3000);
                    console.log('pozvanInit')
                };


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
                {{--$scope.getUsers = function () {--}}
                    {{--$http({--}}
                            {{--method: 'GET',--}}
                            {{--url: API_USERS--}}
                        {{--}).then(function successCallback(response) {--}}
                            {{--$scope.users = response.data;--}}

                            {{--$scope.optionsList = response.data.filter(function (x) {--}}
                                {{--if (x.id == {{Auth::user()->id}})--}}
                                    {{--return false;--}}

                                {{--return true;--}}
                            {{--})--}}


                        {{--}, function errorCallback(response) {--}}
                            {{--// called asynchronously if an error occurs--}}
                            {{--// or server returns response with an error status.--}}
                        {{--});--}}
                    {{--}--}}

            });
        }) ();
    </script>

