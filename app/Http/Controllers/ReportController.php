<?php

namespace App\Http\Controllers;

use App\Report;
use App\Student;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
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
        return view('report.show',compact('report'));
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
    public function destroy($reportId)
    {
        $report = Report::find($reportId);
        if (Auth::id() == $report->user_id or Auth::user()->isAdmin()){
            Student::where('report_id',$reportId)->delete();
            $report = Report::find($reportId);
            $report->MeasurementInstrument = Null;
            $report->AssessmentMethodDetail = Null;
            $report->MinScore = Null;
            $report->MaxScore = Null;
            $report->ProfessorTeam = Null;
            $report->Result = Null;
            $report->PurposeMeasure = Null;
            $report->Results = Null;
            $report->ImproceScores = Null;
            $report->Expected = Null;
            $report->Proposal = Null;
            $report->file = Null;
            $report->pb = Null;
            $report->pd = Null;
            $report->pp = Null;
            $report->pm = Null;
            $report->save();
            return redirect('/report/'.$reportId);
        }

        return back();

    }
}
