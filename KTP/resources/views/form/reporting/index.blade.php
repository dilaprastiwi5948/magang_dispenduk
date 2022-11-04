@extends('template.admin')

@section('content')
<div class="panel panel-default">
    {{-- <div class="panel-heading">
        <div class="card-title">
            <div class="title">{{$title}}</div>
        </div>
    </div> --}}
    <div class="panel-body">
        <div style="margin-bottom: 1rem;">
            <a href="{{route($baseroute.'create')}}" class="btn btn-success">Buat {{strtolower($title)}} baru</a>
            <a href="{{route('admin.report.dailyreport')}}" class="btn btn-primary">Laporan harian {{strtolower($title)}}</a>
        </div>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $item)
                        <tr>
                            <th>{{$item->nik}}</th>
                            <th>{{$item->name}}</th>
                            <th>{{$item->birthplace . ', ' . $item->birthdate}}</th>
                            <th>{{$item->address}}</th>
                            <th>{{$item->sub_districts}}</th>
                            <th>{{$item->districts}}</th>
                            <th>{{$item->city}}</th>
                            <td>{{$item->user->username}}</td>
                            <td><div class="label label-primary">{{$item->explanationtype->name}}</div></td>
                            <td><div class="label label-success">{{$item->submissiontype->name}}</div></td>
                            <td><div class="label label-warning">{{$item->reportingtype->name}}</div></td>
                            <th>{{$item->created_at}}</th>
                            <td style="display: flex">
                                <a href="{{route($baseroute.'show', $item->id)}}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="{{route($baseroute.'edit', $item->id)}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                <form action="{{ route($baseroute.'destroy', $item->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger " onclick="return confirm('Data akan dihapus untuk sementara?')">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
