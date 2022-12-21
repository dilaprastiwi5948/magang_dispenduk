@extends('template.admin')

@push('style')
    <style>
        h4 {
            padding-top: 0 !important;
        }
        @media print {
            .nonprintable {display: none;}
        }
    </style>
@endpush

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <form method="GET" action="{{route($baseroute.'dailyreport')}}" class="panel panel-primary form-inline">
            <div class="panel-heading">
                Cari laporan berdasarkan tanggal
            </div>
            <div>
            <form class="form-inline">
                <strong><p>Tanggal filter laporan</p></strong>
                <div class="form-group mx-sm-3 mb-2">

                    <div class="form-group @error('date') has-error @enderror">
                        <input type="date" class="form-control" required name="date">
                    </div>
                </div>
                <button type="submit" class="btn btn-success mb-2 "><i class="fa fa-search"></i> Cari</button>
            </form>
            </div>
            {{-- <div class="panel-body">
                <div class="form-group @error('date') has-error @enderror">
                    <label for="date">Tanggal filter laporan</label>
                    <input type="date" class="form-control" required name="date">
                </div>
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-search"></i> Cari</button>
            </div> --}}
        </form>

        @if ($data)
        <div class="panel panel-default" id="printable">
            <div class="panel-heading" id="title-page">
                Laporan untuk tanggal {{date('d F Y', strtotime(request()->get('date')))}}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="thumbnail border-total ">
                            <div class="caption">
                                <h4><strong>Total jumlah pemohon</strong></h4>
                                <h4><p class="label label-primary">{{$data->total_all}} Pemohon</p></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="thumbnail border-total">
                            <div class="caption">
                                <h4><strong>Total pemohon dalam daerah</strong></h4>
                                <h4><p class="label label-success">{{$data->total_in_area}} pemohon</p></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="thumbnail border-total">
                            <div class="caption">
                                <h4><strong>Total pemohon luar daerah</strong></h4>
                                <h4><p class="label label-danger">{{$data->total_out_area}} pemohon</p></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Laporan Berdasarkan Keterangan
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Kategori</th>
                                                <th>Jumlah cetak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->explanation as $item)
                                                <tr>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->total ?? 0}} Pemohon</td>
                                                </tr>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    <!--   Kitchen Sink -->
                        <!-- End  Kitchen Sink -->
                    </div>
                    <div class="col-md-6">
                        <!--   Basic Table  -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Laporan Berdasarkan Permohonan
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Kategori</th>
                                                <th>Jumlah cetak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->submission as $item)
                                                <tr>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->total ?? 0}} Pemohon</td>
                                                </tr>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End  Basic Table  -->
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Laporan operator
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Operator</th>
                                            <th>Jumlah cetak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->operator as $item)
                                            <tr>
                                                <td>{{$item->user->username}}</td>
                                                <td>{{$item->total}} Pemohon</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default" id="printable">
                    <div class="panel-heading">
                        <label for="">Pemohon pada tanggal {{date('d F Y', strtotime(request()->get('date')))}}</label>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->all as $item)
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
            <div class="panel-footer nonprintable" >
                <a href="{{route('admin.report.dailyreport.print', ['date' => request()->get('date') ])}}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
            </div>
        </div>
        @else

        @endif

    </div>
</div>
@endsection


@push('admin-script')
    <script>
        function print() {
            let w = window.open();
            w.document.write($("head").html());
            w.document.write($("#printable").html());
            w.print();
            w.close();
        }
        $(document).ready(function () {
            $('.dataTables').dataTable();
        });
    </script>
@endpush