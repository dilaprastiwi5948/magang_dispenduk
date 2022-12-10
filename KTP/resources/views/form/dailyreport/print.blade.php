<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan untuk tanggal {{date('d F Y', strtotime(request()->get('date')))}}</title>
    <!-- Bootstrap Styles-->
    <link href="{{ public_path('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ public_path('assets/css/font-awesome.css') }}" rel="stylesheet" />
        <!-- Custom Styles-->
    {{-- <link href="{{ public_path('assets/css/custom-styles.css') }}" rel="stylesheet" /> --}}
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        .page-break {
            page-break-after: always;
        }
        .border-total {
            border: 2px solid rgb(54, 106, 201);
        }
        .border {
            border-color:rgb(54, 106, 201);
        }
    </style>
</head>
<body>
    <div id="">
        <div class="panel panel-default" id="printable">
            <div class="panel-heading" id="title-page">
                Laporan untuk tanggal {{date('d F Y', strtotime(request()->get('date')))}}
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-3 col-sm-4">
                        <div class="thumbnail border-total">
                            <div class="caption">
                                <h4><strong>Total jumlah pemohon</strong></h4>
                                <h5><span class="label label-primary">{{$data->total_all}} Pemohon</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-4">
                        <div class="thumbnail border">
                            <div class="caption">
                                <h5>Jumlah pemohon dalam daerah</h5>
                                <h5><span class="label label-success">{{$data->total_in_area}} pemohon</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-4">
                        <div class="thumbnail border">
                            <div class="caption">
                                <h5>Jumlah pemohon luar daerah</h5>
                                <h5><span class="label label-danger">{{$data->total_out_area}} pemohon</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <!--   Kitchen Sink -->
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
                        <!-- End  Kitchen Sink -->
                    </div>
                    <div class="col-md-6">
                         <!--   Basic Table  -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Laporan pemohon berdasarkan permohonan
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
                                            @foreach ($data->category as $item)
                                                @foreach ($item as $value)
                                                    <tr>
                                                        <td>{{$value->name}}</td>
                                                        <td>{{$value->total ?? 0}} Pemohon</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End  Basic Table  -->
                    </div>
                </div>
                {{-- <div class="panel panel-default" id="printable">
                    <div class="panel-heading">
                        <label for="">Pemohon pada tanggal {{date('d F Y', strtotime(request()->get('date')))}}</label>
                    </div>
                    <div class="panel-body">
                        <div>
                        <table class="table dataTables table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat, Tanggal lahir</th>
                                    <th>Alamat</th>
                                    <th>Alamat detail</th>
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
                                        <td>{{$item->address }}</td>
                                        <td>{{$item->sub_districts. ', ' . $item->districts . ', ' . $item->city}}</td>
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
            </div> --}}
        </div>
    </div>
    <!-- jQuery Js -->
    <script src="{{ public_path('assets/js/jquery-1.10.2.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ public_path('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
