@extends('template.admin')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <form method="GET" action="{{route($baseroute.'.index')}}" class="panel panel-primary">
            <div class="panel-heading">
                Cari Laporan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Nama Pelapor</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Pelapor...">
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK Pelapor</label>
                            <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK Pelapor...">
                        </div>
                        <div class="form-group ">
                            <label for="reportingtype_id">Jenis Pelaporan</label>
                            <select class="form-control" id="reportingtype_id" name="reportingtype_id">
                                <option selected disabled value="">Pilih Jenis Pelaporan...</option>
                                @foreach ($reportingtype as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">                       
                        <div class="form-group">
                            <label for="explanationtype_id">Jenis Pengajuan</label>
                            <select class="form-control" id="explanationtype_id" name="explanationtype_id">
                                <option selected disabled value="">Pilih Jenis Pengajuan...</option>
                                @foreach ($explanationtype as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="submissiontype_id">Keterangan</label>
                            <select class="form-control" id="submissiontype_id" name="submissiontype_id">
                                <option selected disabled value="">Pilih Keterangan...</option>
                                @foreach ($submissiontype as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="operator">Operator</label>
                            <select class="form-control" id="operator" name="operator">
                                <option selected disabled value="">Pilih Operator...</option>
                                @foreach ($operator as $item)
                                    <option value="{{$item->id}}">{{$item->username}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"  style="font-size:20px">  Cari</i></button>
                <a href="{{route($baseroute.'.index')}}" class="btn btn-danger btn-block"><i class="fa fa-refresh" style="font-size:20px">  Reset</i></a>
            </div>
        </form>
        
        <div class="panel panel-default" id="printable">
        <div class="table-responsive">
        <table class="table dataTables">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal lahir</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kota</th>
                    <th>Nama Operator</th>
                    <th>Pengajuan</th>
                    <th>Keterangan</th>
                    <th>Jenis Pelaporan</th>
                    <th>Tgl Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $item)
                    <tr>
                        <td>{{$item->nik}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->birthplace . ', ' . $item->birthdate}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->sub_districts}}</td>
                        <td>{{$item->districts}}</td>
                        <td>{{$item->city}}</td>
                        <td>{{$item->user->username}}</td>
                        <td><div class="label label-primary">{{$item->explanationtype->name}}</div></td>
                        <td><div class="label label-success">{{$item->submissiontype->name}}</div></td>
                        <td><div class="label label-warning">{{$item->reportingtype->name}}</div></td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>

@endsection

@push('admin-script')
    <script>
        $(document).ready(() => {
            $('#reportingtype_id').val(null).trigger('change');
            $('#submissiontype_id').val(null).trigger('change');
            $('#explanationtype_id').val(null).trigger('change');
            $('#operator').val(null).trigger('change');
            $('.dataTables').dataTable();
        })
    </script>
@endpush