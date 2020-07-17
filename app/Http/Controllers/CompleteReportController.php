<?php

namespace App\Http\Controllers;

use App\Report;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CompleteReportController extends Controller
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
        return view('report',compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('completereport.edit',compact('report'));
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
            'ProfessorTeam' => 'required',
            'result' => 'required',
            'purposemeasure' => 'required',
            'results' => 'required',
            'ImproceScores' => 'required',
            'expected' => 'required',
            'proposal' => 'required'
        ]);

        $report->ProfessorTeam = $request->ProfessorTeam;
        $report->Result = $request->result;
        $report->PurposeMeasure = $request->purposemeasure;
        $report->Results = $request->results;
        $report->ImproceScores = $request->ImproceScores;
        $report->Expected = $request->expected;
        $report->Proposal = $request->proposal;
        $report->save();
        return redirect('/finishprogress/'.$report->id);
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
