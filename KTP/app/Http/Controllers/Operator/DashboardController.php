<?php

namespace App\Http\Controllers\Operator;

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
        $data->total_all = ReportingIdCard::where(['created_by' => auth()->user()->id])->get()->count();
        $data->total_in_area = ReportingIdCard::where(['reportingtype_id' => 1, 'created_by' => auth()->user()->id])->get()->count();
        $data->total_out_area = ReportingIdCard::where(['reportingtype_id' => 2, 'created_by' => auth()->user()->id])->get()->count();
        $data->operator = ReportingIdCard::with('user')->select(['reporting_id_cards.*', DB::raw('count(reporting_id_cards.id) total'), 'created_by'])->where(['created_by' => auth()->user()->id])->groupBy(['reporting_id_cards.created_by', 'reporting_id_cards.id'])->get();
        $data->category = [
            ExplanationType::select(['explanation_types.name', DB::raw('(select count(id) total from reporting_id_cards where explanationtype_id = explanation_types.id and created_by = "'. auth()->user()->id .'" group by explanationtype_id) total')])->get(),
            SubmissionType::select(['submission_types.name', DB::raw('(select count(id) total from reporting_id_cards where submissiontype_id = submission_types.id and created_by = "'. auth()->user()->id .'" group by submissiontype_id) total')])->get()
        ];

        return view('form.admin.dashboard', [
            'title' => null,
            'subtitle' => null,
            'baseroute' => 'admin.dashboard',
            'breadcrumb' => ['Home' => route('admin.dashboard'), 'Dashboard' => null],
            'data' => $data
        ]);
    }

    public function profile()
    {
        return view('form.admin.profile', [
            'title' => "Profile Operator",
            'subtitle' => null,
            'baseroute' => 'admin.dashboard',
            'breadcrumb' => ['Home' => route('admin.dashboard'), 'Profile' => null],
            'user' => User::with('userdetail')->whereId(auth()->user()->id)->first()
        ]);
    }
}
