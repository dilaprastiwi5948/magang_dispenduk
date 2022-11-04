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
        <form method="GET" action="{{route($baseroute.'dailyreport')}}" class="panel panel-primary">
            <div class="panel-heading">
                Cari laporan berdasarkan tanggal
            </div>
            <div class="panel-body">
                <div class="form-group @error('date') has-error @enderror">
                    <label for="date">Tanggal filter laporan</label>
                    <input type="date" class="form-control" required name="date">
                </div>

                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-search"></i> Cari</button>
            </div>
        </form>
        @if ($data)
        <div class="panel panel-default" id="printable">
            <div class="panel-heading" id="title-page">
                Laporan untuk tanggal {{date('d F Y', strtotime(request()->get('date')))}}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h4>Jumlah pemohon</h4>
                                <h4><span class="label label-primary">{{$data->total_all}} Pemohon</span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h4>Jumlah pemohon dalam daerah</h4>
                                <h4><span class="label label-primary">{{$data->total_in_area}} pemohon</span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h4>Jumlah pemohon luar daerah</h4>
                                <h4><span class="label label-primary">{{$data->total_out_area}} pemohon</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="">Laporan operator</label>
                    <table class="table table-bordered">
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
                <div>
                    <label for="">Laporan pemohon berdasarkan pemohon</label>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Jumlah cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->category as $item)
                                @foreach ($item as $value)
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->total ?? 0}} Pemohon</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <label for="">Pemohon hari ini</label>
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
            <div class="panel-footer nonprintable" >
                <button onclick="print()" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
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
    </script>
@endpush
