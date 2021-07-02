@extends('layouts.admin')

@section('main-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <a href="pdf/{{$report->id}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Descargar PDF</a>
        </div>
    <div class="row">
        <div class="col-lg-8 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <?php $course = $report->Course() ?>
                        <?php $category = $report->Category() ?>
                        <b>{{$course->name}}
                          {{$course->description}}</b> Assessment Sheet
                          {{$category->name}}
                          {{$category->description}}
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p><strong>Professor Team:</strong> {{$report->ProfessorTeam}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p><strong>Result:</strong> {{$report->ProfessorTeam}}</p>
                        </div>
                        <div class="col">
                            <p><strong>Expected:</strong> {{$report->Expected}}%</p>
                        </div>
                        <div class="col">
                            <p><strong>Proposal:</strong> {{$report->Proposal}}%</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p><strong>Purpose Measure:</strong><br>{{$report->PurposeMeasure}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p><strong>Results:</strong><br>{{$report->Results}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p><strong>Improce Scores:</strong><br>{{$report->ImproceScores}}</p>
                        </div>
                    </div>

                    <div class="col mr-2 mt-3">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mastery {{$report->Mastery()[0]}}</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$report->Mastery()[1]}}%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$report->Mastery()[1]}}%" aria-valuenow="24"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col mr-2 mt-3">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proficient {{$report->Proficient()[0]}}</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$report->Proficient()[1]}}%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{$report->Proficient()[1]}}%" aria-valuenow="27" aria-valuemin="0" aria-valuemax="30"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col mr-2 mt-3">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Development {{$report->Development()[0]}}</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$report->Development()[1]}}%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{$report->Development()[1]}}%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col mr-2 mt-3">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Beginner {{$report->Beginner()[0]}}</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$report->Beginner()[1]}}%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$report->Beginner()[1]}}%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mt-2">
                      <a href="/files/documents/{{$report->file}}" class="btn btn-primary" download><i class="fas fa-download fa-sm text-white-50"></i> Download Evidence</a>
                    </div>
                    <div class="mt-2">
                      <a href="/restart/{{$report->id}}" class="btn btn-primary">Restart Report</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Semester:</b> {{$course->year}}-{{$course->semester}}</li>
                        <li class="list-group-item">Course: {{$course->name}}</li>
                        <li class="list-group-item">Coordinator: {{$report->User()->name()}}</li>
                        <li class="list-group-item">Indicator: {{$report->Category()->name}} {{$report->Category()->description}}</li>
                        <li class="list-group-item">Measurement Instrument: {{$report->MeasurementInstrument}}</li>
                        <li class="list-group-item">Assessment Method Detail: {{$report->AssessmentMethodDetail}}</li>
                        <li class="list-group-item">Min Score: {{$report->MinScore}}</li>
                        <li class="list-group-item">Max Score: {{$report->MaxScore}}</li>
                        <li class="list-group-item">Student: {{$report->Students()}}</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
