<?php

namespace App\Http\Controllers;

use App\Models\ExplanationType;
use App\Models\ReportingIdCard;
use App\Models\ReportingType;
use App\Models\SubmissionType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use stdClass;

class DailyReportController extends Controller
{
    protected $baseRoute = 'admin.report.';
    protected $viewFolder = 'form.dailyreport.';
    protected $viewName = "Laporan Harian";


    public function index(Request $request)
    {
        $date = $request->get('date');

        $data = null;
        if ($date) {
            $data = new stdClass;
            $data->all = ReportingIdCard::whereDate('created_at', $date)->get();
            $data->total_all = ReportingIdCard::whereDate('created_at', $date)->get()->count();
            $data->total_in_area = ReportingIdCard::where(['reportingtype_id' => 1])->whereDate('created_at', $date)->get()->count();
            $data->total_out_area = ReportingIdCard::where(['reportingtype_id' => 2])->whereDate('created_at', $date)->get()->count();
            $data->operator = ReportingIdCard::with('user')->select(['reporting_id_cards.*', DB::raw('count(reporting_id_cards.id) total'), 'created_by'])->whereDate('created_at', $date)->groupBy('reporting_id_cards.created_by')->get();
            $data->category = [
                ExplanationType::select(['explanation_types.name', DB::raw('(select count(id) total from reporting_id_cards where explanationtype_id = explanation_types.id AND date(created_at) = "'.$date.'" group by explanationtype_id) total')])->get(),
                SubmissionType::select(['submission_types.name', DB::raw('(select count(id) total from reporting_id_cards where submissiontype_id = submission_types.id AND date(created_at) = "'.$date.'" group by submissiontype_id) total')])->get()
            ];
        }

        // ReportingIdCard::with('user')->select(['reporting_id_cards.*', DB::raw('count(reporting_id_cards.id) total'), 'created_by'])->whereDate('created_at', $date)->groupBy(['reporting_id_cards.reportingtype_id','reporting_id_cards.id'])->get(),
        //         ReportingIdCard::with('user')->select(['reporting_id_cards.*', DB::raw('count(reporting_id_cards.id) total'), 'created_by'])->whereDate('created_at', $date)->groupBy(['reporting_id_cards.submissiontype_id' , 'reporting_id_cards.id'])->get(),
        return view($this->viewFolder. 'index', [
            'title' => $this->viewName,
            'baseroute' => $this->baseRoute,
            'breadcrumb' => ['HOME' => route('admin.dashboard'), 'PELAPORAN' => null],
            'data' => $data,
        ]);
    }
}