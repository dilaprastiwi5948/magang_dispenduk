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

            <div class="form-group @error('name') has-error @enderror"">
                <label for="name">Nama {{$title}}</label>
                <input type="text" class="form-control" id="name" placeholder="Nama {{$title}}" name="name" value="{{old('name')}}">
                @error('name')
                    <small id="nameid" class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-default" href="{{route($baseroute.'index')}}">Kembali</a>
        </form>
    </div>
</div>
@endsection
