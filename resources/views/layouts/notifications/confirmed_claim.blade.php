<a href="{{route('users')}}/{{$notification->data['darivatelj']['id']}}"
   class="list-group-item list-group-item-action flex-column align-items-start col-lg-12 " onclick="{{$notification->markAsRead()}}">

    <strong> {{$notification->data["darivatelj"]["name"]}}</strong> je odgovorio potvrdno na zahtjev za donaciju krvi.

    <br><small>{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</small>

</a>