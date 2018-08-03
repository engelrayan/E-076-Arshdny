<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
      integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
      crossorigin=""/>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"
        integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log=="
        crossorigin=""></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style type="text/css">
    #mapid { height: 400px;width: 800px; }
</style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
@extends('frontLayout.app')
@section('title')
Ershedny
@stop

@section('style')

@stop
@section('content')

@if (Sentinel::check() )
<main>
    <div class="big-wrap col-xs-12">
        <div class="user-inner">
            <div class="card preview-card">
                <div class="setting-form col-xs-12">
                    <div class="set-header col-xs-12">
                        <h3>
                            <i class="fa fa-address-card"></i>
                             Hajj Data
                        </h3>
                    </div>
@foreach($userInfo as $userInfo)
                        <div class="pre-form col-xs-12" >
                            <div class="pre-inner">
                                <div class="pre-img">
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label>Hajj picture</label>
                                        <div class="profile-img">
                                            <img src="{{asset('public/images/'.$userInfo->avatar)}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="pre-data">
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label>Hajj name</label>
                                        <input type="text" class="form-control" disabled value="{{Sentinel::getUser()->first_name}} {{Sentinel::getUser()->last_name}}">
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label> Hajj number</label>
                                        <input type="text" class="form-control"  value="{{$userInfo->hajNumber}}" disabled>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label> Border number</label>
                                        <input type="text" class="form-control" value="{{$userInfo->boardNumber}}" disabled>
                                    </div>

                                    <div class="form-group col-md-12 col-xs-12">
                                        <label> His  Adress</label>
                                        <input type="text" class="form-control" value="" disabled>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label> Group address in Makka </label>
                                        <label for="hajAddress" class="cols-sm-2 control-label"> Camp address</label>
                                        <div class="row">
                                            <div id="mapid" style="height: 300px;width: 890px"></div>
                                            <input type="hidden" name="lat" id="lat" value="{{$userInfo->lat}}">
                                            <input type="hidden" name="long" id="lng" value="{{$userInfo->long}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label> Group Name </label>
                                        <input type="text" class="form-control" value="{{$userInfo->hamlaName}}" disabled>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label> Group Number </label>
                                        <input type="text" class="form-control" value="{{$userInfo->hamlaNumber}}" disabled>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label> Group PHone Contact </label>
                                        <input type="text" class="form-control" value="{{$userInfo->hamlaContact}}" disabled>
                                    </div>

                                    <div class="form-group col-md-12 col-xs-12">
                                        <label> Hajj  Hralty </label>
                                        <input type="text" class="form-control" value="{{$userInfo->healty}}" disabled>
                                    </div>
                                </div>
                            </div>

                        </div>
    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endif
@if (! Sentinel::check() )

<br><br><br><br>
<a href="{{ url('qrLogin') }}"> <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="QR Read" type="Submit">Qr Read</button><br></a>
<a href="{{ url('register') }}"> <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Register" type="Submit">Register</button></a>

@endif
@endsection

@section('scripts')


@endsection
@if (Sentinel::check() )

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js">
</script>
<script type="text/javascript">

    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng( {{$userInfo->lat}}, {{$userInfo->long}});
        var mymap = L.map('mapid').setView(latlng, 13);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://mapbox.com">Mapbox</a>',
            maxZoom: 20,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoiYmJyb29rMTU0IiwiYSI6ImNpcXN3dnJrdDAwMGNmd250bjhvZXpnbWsifQ.Nf9Zkfchos577IanoKMoYQ'
        }).addTo(mymap);
        var markerIcon = L.icon({
            iconUrl: "/images/map_marker.png",
            iconSize: [48, 48],
            className: 'animated-icon my-icon-id'
        });
        var marker = L.marker((latlng),{draggable : false,icon: markerIcon}).addTo(mymap);


    });



</script>
    @endif