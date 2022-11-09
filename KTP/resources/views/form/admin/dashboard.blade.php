@extends('template.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="card-title">
            <div class="title">Dashboard</div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="thumbnail">
                    <div class="caption">
                        <h4>Jumlah pemohon</h4>
                        <i class="fa fa-users fa-2x text-gray-300"></i>
                        <h4><span class="label label-primary">{{$data->total_all}} Pemohon</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <div class="caption">
                        <h4>Jumlah pemohon dalam daerah</h4>
                        <i class="fa fa-users fa-2x text-gray-300"></i>
                        <h4><span class="label label-primary">{{$data->total_in_area}} pemohon</span></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <div class="caption">
                        <h4>Jumlah pemohon luar daerah</h4>
                        <i class="fa fa-users fa-2x text-gray-300"></i>
                        <h4><span class="label label-primary">{{$data->total_out_area}} pemohon</span></h4>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->is_admin)
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
        @endif
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
    </div>
</div>
@endsection
