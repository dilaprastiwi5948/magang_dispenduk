<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware("guest")->except('logout');
        $this->middleware("guest:web")->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginSubmit(LoginRequest $request)
    {
        if (Auth::guard('web')->attempt($request->only('username', 'password'))) {
            return redirect()->route(auth()->user()->is_admin ? 'admin.dashboard' : 'operator.dashboard');
        }
        return back()->withInput($request->only('username'))->with([
            'typeToast' => 'error',
            'messageToast' => 'Username / Password yang anda masukan salah',
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerSubmit(RegisterRequest $request)
    {
        $userReq = [
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'is_admin' => 0
        ];

        $user = User::create($userReq);

        $userDetailReq = [
            'user_id' => $user->id,
            'name' => $request->get('name'),
            'nik' => $request->get('nik'),
            'position' => $request->get('jabatan')
        ];

        $userDetail = UserDetail::create($userDetailReq);

        $toast = array(
            'typeToast' => 'success',
            'messageToast' => 'Berhasil melakukan register.',
        );
        return redirect()->route('login')->withInput($request->only('username'))->with($toast);
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('web')->logout();

        $toast = array(
            'typeToast' => 'success',
            'messageToast' => 'Berhasil melakukan logout.',
        );
        return redirect()->route('login')->with($toast);
    }

    public function loginTry($request)
    {

    }
}
