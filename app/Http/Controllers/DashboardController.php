<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Indicator;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->isAdmin()){
            $reports = Report::whereNotNull('pm')->get();
            $complete = [];
            $incomplete = [];
            $summary = [];
            $summary['beginner'] = 0;
            $summary['development'] = 0;
            $summary['proficient'] = 0;
            $summary['mastery'] = 0;
            foreach ($reports as $key => $report) {
                if($report->minScore == Null){
                    $summary['beginner'] += $report->Beginner()[0];
                    $summary['development'] += $report->Development()[0];
                    $summary['proficient'] += $report->Proficient()[0];
                    $summary['mastery'] += $report->Mastery()[0];
                }
            }
            $summary['beginner'] = $summary['beginner']*100/$report->count();
            $summary['development'] = $summary['development']*100/$report->count();
            $summary['proficient'] = $summary['proficient']*100/$report->count();
            $summary['mastery'] = $summary['mastery']*100/$report->count();
            $indicator = Indicator::whereNotNull('id')->orderby('name','asc')->pluck('name');
            return view('admin.dashboard',compact('summary','reports','indicator'));
        }
    }
}
