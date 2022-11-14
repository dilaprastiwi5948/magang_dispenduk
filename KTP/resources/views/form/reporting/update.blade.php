@extends('template.admin')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="card-title">
            <div class="title">Buat {{$title}}</div>
        </div>
    </div>
    <div class="panel-body">
        <form action="{{route($baseroute.'update', $data)}}" method="post" class="container-fluid">
            @csrf
            @method('PUT')
            <div class="form-group @error('reportingtype_id') has-error @enderror">
                <label for="reportingtype_id">Jenis Pelaporan</label>
                <select class="form-control" id="reportingtype_id" name="reportingtype_id">
                    <option selected disabled value="">Pilih Jenis Pelaporan...</option>

                    @foreach ($reportingtype as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('reportingtype_id')
                    <small id="reportingtype_id" class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group @error('explanationtype_id') has-error @enderror">
                <label for="explanationtype_id">Jenis Pengajuan</label>
                <select class="form-control" id="explanationtype_id" name="explanationtype_id">
                    <option selected disabled value="">Pilih Jenis Pengajuan...</option>

                    @foreach ($explanationtype as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('explanationtype_id')
                    <small id="explanationtype_id" class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group @error('submissiontype_id') has-error @enderror">
                <label for="submissiontype_id">Keterangan</label>
                <select class="form-control" id="submissiontype_id" name="submissiontype_id">
                    <option selected disabled value="">Pilih Keterangan...</option>

                    @foreach ($submissiontype as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('submissiontype_id')
                    <small id="submissiontype_id" class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('nik') has-error @enderror">
                        <label for="nik">Nomor Induk Kependudukan</label>
                        <input type="text" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan" name="nik" value="{{old('nik') ?? $data->nik}}">
                        @error('nik')
                            <small id="nikid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name" value="{{old('name') ?? $data->name}}">
                        @error('name')
                            <small id="nameid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group @error('birthplace') has-error @enderror">
                        <label for="birthplace">Tempat Lahir</label>
                        <input type="text" class="form-control" id="birthplace" placeholder="Tempat Lahir" name="birthplace" value="{{old('birthplace') ?? $data->birthplace}}">
                        @error('birthplace')
                            <small id="birthplaceid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group @error('birthdate') has-error @enderror">
                        <label for="birthdate">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="birthdate" placeholder="Tanggal Lahir" name="birthdate" value="{{old('birthdate') ?? $data->birthdate}}">
                        @error('birthdate')
                            <small id="birthdateid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group @error('address') has-error @enderror">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" id="address" placeholder="Alamat" name="address">{{old('address')?? $data->address}}</textarea>
                        @error('address')
                            <small id="addressid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group @error('province') has-error @enderror">
                        <label for="province">Provinsi</label>
                        <select class="form-control" disabled id="select2-provinsi"></select>
                        <input type="text" name="province" id="value-province" value="{{old('province') ?? $data->province}}" hidden>
                        @error('province')
                            <small id="provinceid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group @error('city') has-error @enderror">
                        <label for="city">Kota / Kabupaten</label>
                        <select class="form-control" disabled id="select2-city"></select>
                        <input type="text" name="city" id="value-city" value="{{old('city') ?? $data->city}}" hidden>
                        @error('city')
                            <small id="cityid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group @error('districts') has-error @enderror">
                        <label for="districts">Kecamatan</label>
                        <select class="form-control" disabled id="select2-districts"></select>
                        <input type="text" name="districts" id="value-districts" value="{{ old('districts') ?? $data->districts}}" hidden>
                        @error('districts')
                            <small id="districtsid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group @error('sub_districts') has-error @enderror">
                        <label for="sub_districts">Kelurahan</label>
                        <select class="form-control" disabled id="select2-sub_districts"></select>
                        <input type="text" name="sub_districts" id="value-sub_districts" hidden value="{{old('sub_districts') ?? $data->sub_districts}}">
                        @error('sub_districts')
                            <small id="sub_districtsid" class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-default" href="{{route($baseroute.'index')}}">Kembali</a>
        </form>
    </div>
</div>
@endsection

@push('admin-script')
    <script src="{{ asset('assets/js/admin-reporting.js') }}"></script>

    <script>
        $(document).ready(() => {
            $('#reportingtype_id').val('{{$data->reportingtype_id}}').trigger('change');
            $('#submissiontype_id').val('{{$data->submissiontype_id}}').trigger('change');
            $('#explanationtype_id').val('{{$data->explanationtype_id}}').trigger('change');
        })
    </script>
@endpush
