@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <center><img src="{{ asset('storage/'.auth()->user()->avatar) }}" style="max-height: 150px; margin-bottom: 2%; border: 3px silver solid;"></center>
                            </div>

                            <div class="col-md-12">
                                <div class="panel-body"></div>
                            </div>

                            <div class="col-md-12">
                                <p><b>Nama : </b> {{ old('name')  ?? auth()->user()->name }}</p>
                            </div>

                            <div class="col-md-12">
                                <p><b>Email : </b> {{ old('email')  ?? auth()->user()->email }}</p>
                            </div>
                        </div>  
                    </div>
            </div>
        </div>
 


        <div class="col-md-8">
                <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" required>

                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
