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
    Register
@stop
@section('content')
    <div class = "container">
        <div class="wrapper">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">Complete Data</h1>
                    <hr />
                </div>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-{{(Session::get('status')=='error')?'danger':Session::get('status')}} " alert-dismissable fade in id="sessions-hide">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('status')}}!</strong> {!! Session::get('message') !!}
                </div>
            @endif
            {{ Form::open(array('url' => route('UserInfo'), 'class' => 'form-horizontal form-signin','enctype'=>'multipart/form-data','files' => true)) }}
            {!! csrf_field() !!}
            <div class="form-group  {{ $errors->has('hajNumber') ? 'has-error' : ''}}">
                <label for="hajNumber" class="cols-sm-2 control-label"> Haj Number</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></span>
                        {!! Form::text('hajNumber', null, ['class' => 'form-control','placeholder '=>'Enter Hajj Number']) !!}
                    </div>
                    {!! $errors->first('hajNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group  {{ $errors->has('boardNumber') ? 'has-error' : ''}}">
                <label for="boardNumber" class="cols-sm-2 control-label">Border Number</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i></span>
                        {!! Form::text('boardNumber', null, ['class' => 'form-control','placeholder '=>'Enter your Border Number']) !!}
                    </div>
                    {!! $errors->first('boardNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group  {{ $errors->has('address') ? 'has-error' : ''}}">
                <label for="address" class="cols-sm-2 control-label">Country Address</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        {!! Form::text('address', null, ['class' => 'form-control','placeholder '=>'address']) !!}
                    </div>
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group  {{ $errors->has('hamlaName') ? 'has-error' : ''}}">
                <label for="hajAddress" class="cols-sm-2 control-label"> Camp address</label>
                <div class="row">
                    <div id="mapid" style="height: 250px;width: 400px"></div>
                    <input type="hidden" name="lat" id="lat" value="">
                    <input type="hidden" name="long" id="lng" value="">
                </div>
            </div>

            <div class="form-group  {{ $errors->has('hamlaName') ? 'has-error' : ''}}">
                <label for="hamlaName" class="cols-sm-2 control-label">Group Name</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-group" aria-hidden="true"></i></span>
                        {!! Form::text('hamlaName', null, ['class' => 'form-control','placeholder '=>'Group Name']) !!}

                    </div>
                    {!! $errors->first('hamlaName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group  {{ $errors->has('hamlaNumber') ? 'has-error' : ''}}">
                <label for="hamlaNumber" class="cols-sm-2 control-label">Group Number </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i></span>
                        {!! Form::text('hamlaNumber', null, ['class' => 'form-control','placeholder '=>'Group Number']) !!}

                    </div>
                    {!! $errors->first('hamlaNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group  {{ $errors->has('hamlaContact') ? 'has-error' : ''}}">
                <label for="password" class="cols-sm-2 control-label">Group Contact </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        {!! Form::text('hamlaContact', null, ['class' => 'form-control','placeholder '=>'Group Contact']) !!}

                    </div>
                    {!! $errors->first('hamlaContact', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group  {{ $errors->has('healty') ? 'has-error' : ''}}">
                <label for="healty" class="cols-sm-2 control-label">Health </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-heart" aria-hidden="true"></i></span>
                        {!! Form::text('healty', null, ['class' => 'form-control','placeholder '=>'Health']) !!}

                    </div>
                    {!! $errors->first('healty', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group col-md-12 col-xs-12">
                    <label>profile picture</label>
                    <div class="profile-img">
                        <img id="logo" src="/images/logo.png" alt="">
                        <div class="img-edit-caption">
                            <div class="fileupload fileupload-exists">
                                <input type="hidden" value="" name="">
                                <span class="btn btn-primary btn-file">
                                            <span class="fileupload-new">
                                                <i class="upload-icon fa fa-camera"></i>
                                                upload profile picture
                                            </span>
                                            <input name="avatar" onchange="changePreview(this)" type="file" >
                                        </span>
                            </div>
                        </div>
                    </div>

            </div>
                <button class="btn btn-primary btn-lg btn-block register-button" type="submit" >Register</button>

            </div>
            <div class="login-register">
                <a href="{{url('login')}}">Login</a>
                @if ($errors->has('global'))
                    <span class="help-block danger">
                        <strong style="color:red" >{{ $errors->first('global') }}</strong>
                    </span>
                @endif
            </div>
            {{ Form::close() }}
        </div>
@endsection

@section('scripts')

@endsection

<script>
    function changePreview(file){
        var reader = new FileReader();
        if(file.files[0].type == "image/png" || file.files[0].type == "image/bmp"
            || file.files[0].type == "image/jpeg" || file.files[0].type == "image/jpg"){
            // var file = $(file).prop('files')[0]
            reader.readAsDataURL(file.files[0]);
            reader.onload = function (e) {

                $('#logo').attr('src', e.target.result);

            }
        } else {
            $(file).val('')
            alert('Extension Not Supported Only PNG / BMP / JPEG / JPG');
        }

    }
</script>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBpgW6meI9geWvt-7ZolYr7oxJqJuJmLQI"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js">
</script>
<script type="text/javascript">

    navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude),
            mymap = L.map('mapid').setView(latlng, 16);
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
        var marker = L.marker((latlng),{draggable : true,icon: markerIcon}).addTo(mymap);

        marker.bindTooltip("choose your Camp").openTooltip();
        marker.on('move',function (e) {
            var LatLong = marker.getLatLng();
            var lat = LatLong['lat'];
            var lng = LatLong['lng'];
            $('#lat').val(lat);
            $('#lng').val(lng);
            console.log(lat, lng);
        });
    });
    //     var popup = L.popup()
    //         .setLatLng([31.205753, 29.924526])
    //         .setContent('<a href="http://google.com">hello</a>')
    //         .openOn(mymap);


</script>