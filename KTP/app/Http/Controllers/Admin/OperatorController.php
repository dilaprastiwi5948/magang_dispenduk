<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
    protected $baseRoute = 'admin.operator.';
    protected $viewFolder = 'form.operator.';
    protected $viewName = "Operator";
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->viewFolder . "index", [
            'title' => $this->viewName,
            'baseroute' => $this->baseRoute,
            'breadcrumb' => ['home' => route('admin.dashboard'), 'opearator' => null],
            'datas' => $this->model->with('userdetail')->withTrashed()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewFolder . "create", [
            'title' => $this->viewName,
            'baseroute' => $this->baseRoute,
            'breadcrumb' => ['home' => route('admin.dashboard'), 'opearator' => route($this->baseRoute.'index'), 'create' => null],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'nik' => 'required|min:16|numeric',
            'position' => 'required|string',
            'username' => 'required',
            'password' => 'required|min:7',
            'is_admin' => 'required'
        ]);

        $userdata = [
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'is_admin' => $request->get('is_admin')
        ];
        $user = User::create($userdata);
        $userdetail = $request->only(['name', 'nik', 'position']);
        $userdetail['user_id'] = $user->id;
        UserDetail::create($userdetail);

        $toast = array(
            'typeToast' => 'success',
            'messageToast' => 'Berhasil menambahkan data.',
        );
        return redirect()->route($this->baseRoute.'index')->with($toast);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->viewFolder . "update", [
            'title' => $this->viewName,
            'baseroute' => $this->baseRoute,
            'breadcrumb' => ['home' => route('admin.dashboard'), 'opearator' => route($this->baseRoute.'index'), 'edit' => null],
            'data' => $this->model->withTrashed()->with('userdetail')->whereId($id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'nik' => 'required|min:16|numeric',
            'position' => 'required|string',
            'username' => 'required',
            'is_admin' => 'required'
        ]);
        $oldUser = User::withTrashed()->whereId($id)->first();

        $user = [
            'username' => $request->get('username'),
            'password' => (!empty($request->get('password')) ? Hash::make($request->get('password')) : $oldUser->password),
            'is_admin' => $request->get('is_admin')
        ];

        $this->model->withTrashed()->whereId($id)->update($user);
        UserDetail::withTrashed()->where(['user_id' => $id])->update($request->only(['name', 'nik', 'position']));

        $toast = array(
            'typeToast' => 'success',
            'messageToast' => 'Berhasil mengubah data.',
        );
        return redirect()->route($this->baseRoute.'index')->with($toast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = $this->model->withTrashed()->whereId($id);

        if ($data->first()->deleted_at) {
            $data->restore();
        }else{
            $data->delete();
        }

        $toast = array(
            'typeToast' => 'success',
            'messageToast' => !$data->first()->deleted_at ? 'Berhasil mengembalikan data.' : 'Berhasil menghapus data.',
        );
        return redirect()->route($this->baseRoute.'index')->with($toast);
    }
}