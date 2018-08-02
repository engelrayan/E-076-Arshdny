
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
                                        <input type="text" class="form-control" value="{{$userInfo->address}}" disabled>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label> Group address in Makka </label>
                                        <input type="text" class="form-control" value="{{$userInfo->hajAddress}}" disabled>
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
