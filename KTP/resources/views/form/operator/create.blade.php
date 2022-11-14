@extends('template.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="card-title">
            <div class="title">Buat {{$title}}</div>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{route($baseroute.'store')}}" method="post" class="container-fluid">
            @csrf

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="name">Nama {{$title}}</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama {{$title}}" name="name" value="{{old('name')}}">
                        @error('name')
                            <small id="nameid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group @error('nik') has-error @enderror">
                        <label for="nik">NIK {{$title}}</label>
                        <input type="number" class="form-control" id="nik" placeholder="NIK {{$title}}" name="nik" value="{{old('nik')}}">
                        @error('nik')
                            <small id="nikid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group @error('position') has-error @enderror">
                        <label for="position">Jabatan {{$title}}</label>
                        <input type="text" class="form-control" id="position" placeholder="Jabatan {{$title}}" name="position" value="{{old('position')}}">
                        @error('position')
                            <small id="positionid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group @error('username') has-error @enderror">
                        <label for="username">Username {{$title}}</label>
                        <input type="text" class="form-control" id="username" placeholder="Username {{$title}}" name="username" value="{{old('username')}}">
                        @error('username')
                            <small id="usernameid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group @error('password') has-error @enderror">
                        <label for="password">Password {{$title}}</label>
                        <input type="password" class="form-control" id="password" placeholder="Password {{$title}}" name="password" value="{{old('password')}}">
                        @error('password')
                            <small id="passwordid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group @error('is_admin') has-error @enderror">
                        <label for="is_admin">User roles {{$title}}</label>
                        <select name="is_admin" class="form-control" id="is_admin">
                            <option {{old('is_admin') == 1 ? "required" : ""}} value="1">Admin</option>
                            <option {{old('is_admin') == 0 ? "required" : ""}} value="0">Operator</option>
                        </select>
                        @error('is_admin')
                            <small id="is_adminid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-default" href="{{route($baseroute.'index')}}">Kembali</a>
        </form>
    </div>
</div>
@endsection
