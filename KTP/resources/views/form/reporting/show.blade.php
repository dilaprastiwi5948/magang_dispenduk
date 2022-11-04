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
                <div class="col-sm-6">
                    <div class="row">
                        <label class="col-sm-3">Nama</label>
                        <small class="">: {{$data->name}}</small>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Nomor Induk Kependukan</label>
                        <small class="">: {{$data->nik}}</small>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Tempat, Tanggal lahir</label>
                        <small class="">: {{$data->birthplace}}, {{$data->birthdate}} </small>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Alamat</label>
                        <small class="">: {{$data->address}}</small>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Kelurahan</label>
                        <small class="">: {{$data->sub_districts}}</small>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Kecamatan</label>
                        <small class="">: {{$data->districts}}</small>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Kota</label>
                        <small class="">: {{$data->city}}</small>
                    </div>
                    <div class="row">
                        <label class="col-sm-3">Province</label>
                        <small class="">: {{$data->province}}</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-3">Jenis Pelaporan</label>
                        <small><label for="" class="label label-primary">{{$data->reportingtype->name}}</label></small>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Keterangan</label>
                        <small><label for="" class="label label-primary">{{$data->submissiontype->name}}</label></small>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Jenis Pengajuan</label>
                        <small><label for="" class="label label-primary">{{$data->explanationtype->name}}</label></small>
                    </div>
                </div>
            </div>

            <a class="btn btn-default" href="{{route($baseroute.'index')}}">Kembali</a>
        </div>

    </div>
</div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.dataTables').dataTable();
        });
    </script>
@endpush
