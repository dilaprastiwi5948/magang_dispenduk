<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExplanationType;
use App\Models\ReportingIdCard;
use App\Models\SubmissionType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class DashboardController extends Controller
{
    public function index()
    {
        $data = new stdClass;
        $data->total_all = ReportingIdCard::get()->count();
        $data->total_in_area = ReportingIdCard::where(['reportingtype_id' => 1])->get()->count();
        $data->total_out_area = ReportingIdCard::where(['reportingtype_id' => 2])->get()->count();
        $data->operator = ReportingIdCard::with('user')->select(['reporting_id_cards.*', DB::raw('count(reporting_id_cards.id) total'), 'created_by'])->groupBy(['reporting_id_cards.created_by'])->get();
        $data->category = [
            ExplanationType::select(['explanation_types.name', DB::raw('(select count(id) total from reporting_id_cards where explanationtype_id = explanation_types.id group by explanationtype_id) total')])->get(),
            SubmissionType::select(['submission_types.name', DB::raw('(select count(id) total from reporting_id_cards where submissiontype_id = submission_types.id group by submissiontype_id) total')])->get()
        ];

        return view('form.admin.dashboard', [
            'title' => null,
            'subtitle' => null,
            'baseroute' => 'admin.dashboard',
            'breadcrumb' => ['home' => route('admin.dashboard'), 'dashboard' => null],
            'data' => $data
        ]);
    }

    public function profile()
    {
        return view('form.admin.profile', [
            'title' => "Profile Admin",
            'subtitle' => null,
            'baseroute' => 'admin.dashboard',
            'breadcrumb' => ['home' => route('admin.dashboard'), 'profile' => null],
            'user' => User::with('userdetail')->whereId(auth()->user()->id)->first()
        ]);
    }
}
