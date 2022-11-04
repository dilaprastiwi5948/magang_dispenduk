@extends('template.index')

@push('style')
    <style>
        /* body {
            background: none;
        } */

        #wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

    </style>
@endpush

@section('body')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="card-title">
                <div class="title">Login page</div>
            </div>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="form-group @error('username') has-error @enderror">
                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" value="{{old('username')}}">
                        @error('username')
                        <small id="usernameid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group @error('password') has-error @enderror">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="password" name="password"">
                        @error('password')
                        <small id="passwordid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                        <a href="{{ route('register') }}" class="btn btn-default" role="button">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
