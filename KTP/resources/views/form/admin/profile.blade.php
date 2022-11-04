@extends('template.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="card-title">
            <div class="title">{{$title}}</div>
        </div>
    </div>
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <label class="col-sm-3">Username</label>
                <small class="col-sm-6">: {{$user->username}}</small>
            </div>
            <div class="row">
                <label class="col-sm-3">Nama Lengkap</label>
                <small class="col-sm-6">: {{$user->userdetail->name}}</small>
            </div>
            <div class="row">
                <label class="col-sm-3">Nomor induk kependudukan</label>
                <small class="col-sm-6">: {{$user->userdetail->nik}}</small>
            </div>
            <div class="row">
                <label class="col-sm-3">Jabatan</label>
                <small class="col-sm-6">: {{$user->userdetail->position}}</small>
            </div>
            <hr>
            <a class="btn btn-default" href="{{route($baseroute)}}">Kembali</a>
        </div>
    </div>
</div>
@endsection
