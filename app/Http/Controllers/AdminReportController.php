<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use App\Report;
use App\Student;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){

            $reports = Report::orderby('updated_at','desc')->orderBy('file','desc')->orderBy('pb','desc')->get();
            $indicators = Category::with('getReports')->orderby('name')->groupby('categories.id')->get();
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
            foreach ($indicators as $key => $indicator) {
                foreach ($indicator->getReports as $key => $value) {
                    if($key + 1 == count($indicator->getReports) and $value->file == Null){
                        $incomplete[] = $indicator;
                    }
                    if ($value->file != Null){
                        $complete[] = $indicator;
                        break;
                    }
                 }
            }
            return view('admin.index',compact('reports','complete','incomplete','summary'));
        }

        return abort(404);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        if(Auth::user()->isAdmin()){
            return view('admin.show',compact('report'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
    	//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
