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
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map" aria-hidden="true"></i></span>
                        {!! Form::text('hajAddress', null, ['class' => 'form-control','placeholder '=>'Camp Address']) !!}

                    </div>
                    {!! $errors->first('hajAddress', '<p class="help-block">:message</p>') !!}
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