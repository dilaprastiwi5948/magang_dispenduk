<?php

namespace App\Http\Controllers;

use App\Models\ExplanationType;
use App\Models\ReportingIdCard;
use App\Models\ReportingType;
use App\Models\SubmissionType;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $datas = ReportingIdCard::when($request->get("name"), fn($query, $search) => $query->where('name', 'like', '%'. $search .'%'))
            ->when($request->get("nik"), fn($query, $search) => $query->where('nik', 'like', '%'. $search .'%'))
            ->when($request->get("explanationtype_id"), fn($query, $search) => $query->where('explanationtype_id', $search))
            ->when($request->get("submissiontype_id"), fn($query, $search) => $query->where('submissiontype_id', $search))
            ->when($request->get("reportingtype_id"), fn($query, $search) => $query->where('reportingtype_id', $search))
            ->when($request->get("operator"), fn($query, $search) => $query->where('created_by', $search))
            ->with(['explanationtype', 'reportingtype', 'submissiontype', 'user'])->orderBy('created_at', 'desc')
            ->get();


        return view('form.search.index', [
            'title' => "Pencarian data",
            'baseroute' => auth()->user()->is_admin ? 'admin.search' : 'operator.search',
            'breadcrumb' => ['home' => route((auth()->user()->is_admin ? 'admin.' : 'operator.') .'dashboard'), 'searching' => null],
            'reportingtype' => ReportingType::get(),
            'submissiontype' => SubmissionType::get(),
            'explanationtype' => ExplanationType::get(),
            'operator' => User::where('is_admin', 0)->get(),
            'datas' => $datas
        ]);
    }
}
