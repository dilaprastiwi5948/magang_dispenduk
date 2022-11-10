<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-dark fs-5">
                                <img src=" {{url('/assets/img/10.png')}} "
                                    class="rounded-circle" style="width: 150px;" alt="Avatar" /><br>
                                REGISTER
                            </h5>
                            <form action="{{ route('register.submit') }}" method="POST">
                                @csrf
                                <div class="col-md-12 mb-2">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" id="inputnik"
                                        placeholder="Nomor Induk Keluarga" name="nik" value="{{old('nik')}}">
                                    @error('nik')
                                    <small id="nikid" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" id="inputname" placeholder="Nama Lengkap"
                                        name="name" value="{{old('name')}}">
                                    @error('name')
                                    <small id="nameid" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control" id="inputjabatan" placeholder="Jabatan"
                                        name="jabatan" value="{{old('jabatan')}}">
                                    @error('jabatan')
                                    <small id="jabatanid" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="inputusername" placeholder="Username"
                                        name="username" value="{{old('username')}}">
                                    @error('username')
                                    <small id="usernameid" class="text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                                <div class="col-md-12 mb-2">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="inputpassword"
                                        placeholder="Password" name="password">
                                    @error('password')
                                    <small id=" passwordid" class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold"
                                        type="submit">Register</button>
                                    <p><br>Have an account?
                                        <a class="link-danger" href="{{ route('login') }}">Sign In</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>