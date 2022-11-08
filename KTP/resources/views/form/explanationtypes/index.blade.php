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
            <a href="{{route($baseroute.'create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Buat {{strtolower($title)}} baru</a>
        </div>
        <div class="table-responsive">
            <table class="table dataTables">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Dibuat</th>
                        <th>Terakhir Diubah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $item)
                        <tr>
                            @foreach ($fields as $field)
                                <td>{{$item[$field]}}</td>
                            @endforeach
                            <td style="display: flex; gap: 0.5rem">
                                <a href="{{route($baseroute.'edit', $item->id)}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                <form action="{{ route($baseroute.'destroy', $item->id ) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm @if(!$item->deleted_at) btn-danger @else btn-secondary @endif" onclick="return confirm(@if(!$item->deleted_at) 'Data akan dihapus untuk sementara?' @else 'Data akan dikembalikan?' @endif)">
                                        <span class="@if(!$item->deleted_at) glyphicon glyphicon-trash @else glyphicon glyphicon-repeat @endif"></span>
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