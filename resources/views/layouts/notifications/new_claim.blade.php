<a href="{{route('claims')}}/{{$notification->data['claim']['id']}}"
   class="list-group-item list-group-item-action flex-column align-items-start col-lg-12 " onclick="{{$notification->markAsRead()}}">

        <strong> {{$notification->data["trazitelj"]["name"]}}</strong>
       objavljuje zahtjev za donaciju krvi, krvne grupe  <strong>{{$notification->data['claim']['patient_blood']}}</strong>
        <small>{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</small>

</a>