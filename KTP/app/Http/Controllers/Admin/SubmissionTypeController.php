<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubmissionType;
use Illuminate\Http\Request;

class SubmissionTypeController extends Controller
{
    protected $baseRoute = 'admin.submissiontypes.';
    protected $viewFolder = 'form.submissiontypes.';
    protected $viewName = "Jenis Keterangan";
    protected $model;


    public function __construct()
    {
        $this->model = new SubmissionType();
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
            'breadcrumb' => ['Home' => route('admin.dashboard'), 'Submissiontypes' => null],
            'fields' => $this->model->getFillable(),
            'datas' => $this->model->withTrashed()->get()
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
            'breadcrumb' => ['Home' => route('admin.dashboard'), 'Submissiontypes' => route('admin.submissiontypes.index'), 'Create' => null],
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
            'name' => 'required'
        ]);

        $this->model->create(['name' => $request->name]);

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
    public function show($id)
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
            'breadcrumb' => ['Home' => route('admin.dashboard'), 'Submissiontypes' => route($this->baseRoute.'index'), 'Edit' => null],
            'data' => $this->model->withTrashed()->whereId($id)->first()
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
            'name' => 'required'
        ]);

        $this->model->withTrashed()->whereId($id)->update(['name' => $request->name]);

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
