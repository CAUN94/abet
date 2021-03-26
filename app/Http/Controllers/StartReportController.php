<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use App\Report;
use App\Student;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StartReportController extends Controller
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
        //
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        // return $report;
        return view('startreport.edit',compact('report'));
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
        $request->validate([
            'measurement_instrument' => 'required',
            'assessment_method_detail' => 'required',
            'maxscore' => 'required',
            'minscore' => 'required',
            'pb' => 'required',
            'pd' => 'required',
            'pp' => 'required',
            'pm' => 'required',
            'excel' => 'required'
        ]);

        $data = Excel::toArray(new StudentImport(), $request->file('excel'));

        foreach ($data[0] as $key => $value) {
            $student = new Student;
            $student->report_id = $report->id;
            $student->last_name = $value[0];
            $student->first_name = $value[1];
            $student->score = $value[2];
            $student->save();
        }


        $report->MeasurementInstrument = $request->measurement_instrument;
        $report->AssessmentMethodDetail = $request->assessment_method_detail;
        $report->MaxScore = $request->maxscore;
        $report->MinScore = $request->minscore;
        $report->pb = $request->pb;
        $report->pd = $request->pd;
        $report->pp = $request->pp;
        $report->pm = $request->pm;
        $report->save();
        return redirect('/reportprogress/'.$report->id);
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
