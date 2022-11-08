<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExplanationType;
use App\Models\ReportingIdCard;
use App\Models\ReportingType;
use App\Models\SubmissionType;
use Illuminate\Http\Request;

class ReportingController extends Controller
{
    protected $baseRoute = 'admin.reporting.';
    protected $viewFolder = 'form.reporting.';
    protected $viewName = "Pelaporan KTP";
    protected $model;

    public function __construct()
    {
        $this->model = new ReportingIdCard();
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
            'breadcrumb' => ['Home' => route('admin.dashboard'), 'Reporting' => null],
            'datas' => $this->model->with(['explanationtype', 'reportingtype', 'submissiontype', 'user'])->orderBy('created_at', 'desc')->get()
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
            'breadcrumb' => ['Home' => route('admin.dashboard'), 'Reporting' => route($this->baseRoute.'index'), 'Create' => null],
            'reportingtype' => ReportingType::get(),
            'submissiontype' => SubmissionType::get(),
            'explanationtype' => ExplanationType::get(),
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
            'name' => 'required',
            'reportingtype_id' => 'required',
            'submissiontype_id' => 'required',
            'explanationtype_id' => 'required',
            'nik' => 'required|min:16|max:17',
            'name' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'districts' => 'required',
            'sub_districts' => 'required',
        ]);

        $data = $request->only($this->model->getFillable());
        $data['created_by'] = auth()->user()->id;

        $this->model->create($data);

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
        $data = $this->model->whereId($id)->with(['explanationtype', 'reportingtype', 'submissiontype', 'user'])->first();
        return view($this->viewFolder . "show", [
            'title' => $this->viewName,
            'baseroute' => $this->baseRoute,
            'breadcrumb' => ['Home' => route('admin.dashboard'), 'Reporting' => route($this->baseRoute.'index'), 'Detail' => null],
            'data' => $data
        ]);
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
            'breadcrumb' => ['Home' => route('admin.dashboard'), 'Reporting' => route($this->baseRoute.'index'), 'Edit' => null],
            'reportingtype' => ReportingType::get(),
            'submissiontype' => SubmissionType::get(),
            'explanationtype' => ExplanationType::get(),
            'data' => $this->model->whereId($id)->first()
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
            'name' => 'required',
            'reportingtype_id' => 'required',
            'submissiontype_id' => 'required',
            'explanationtype_id' => 'required',
            'nik' => 'required|min:16|max:17',
            'name' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'districts' => 'required',
            'sub_districts' => 'required',
        ]);

        $data = $request->only($this->model->getFillable());
        $data['created_by'] = auth()->user()->id;

        $this->model->whereId($id)->update($data);

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

        $data = $this->model->whereId($id);

        // if ($data->first()->deleted_at) {
        //     $data->restore();
        // }else{
            $data->delete();
        // }

        $toast = array(
            'typeToast' => 'success',
            'messageToast' => !$data->first()->deleted_at ? 'Berhasil mengembalikan data.' : 'Berhasil menghapus data.',
        );
        return redirect()->route($this->baseRoute.'index')->with($toast);
    }
}
