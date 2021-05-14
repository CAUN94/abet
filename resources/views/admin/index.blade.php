@extends('layouts.admin')

@section('main-content')

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-8 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
            </div>
            <div class="card-body">
                <div class="row" id="myDiv">
                    <!-- Nav Item - Pages Collapse Menu -->
                    @foreach($reports as $report)
                            <div class="col-xl-6 col-md-6 mb-4 report">
                              <div class="card border-left-{{$report->status()}} shadow h-100 py-2">
                                <a href="/admin/{{$report->id}}">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs report-diva font-weight-bold text-{{$report->status()}} text-uppercase mb-1">{{$report->Course()->code}}</div>
                                          <?php $user = App\User::find($report->user_id) ?>
                                          <small class="report-divb">Coordinator: {{$user->first_name}} {{$user->last_name}}</small>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800 report-divc">{{$report->Course()->name}}</div>
                                          <div class="text-xs mt-2 mb-0 font-weight-bold text-gray-800 report-divd">
                                            {{$report->Category()->name}}
                                            {{$report->Category()->description}}
                                        </div>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                            </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-4 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Reports Status {{'App\Report'::CountAllReports()}}</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-danger" role="alert">
                    Incomplete Reports: {{'App\Report'::getIncomplete()}}
                </div>
                <div class="alert alert-success" role="alert">
                    Complete Reports: {{'App\Report'::getComplete()}}
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Summary</h6>
            </div>
            <div class="card-body">
                <ul>
                    <li>Beginner: {{$summary['beginner']}}</li>
                    <li>Development: {{$summary['development']}}</li>
                    <li>Proficient: {{$summary['proficient']}}</li>
                    <li>Mastery: {{$summary['mastery']}}</li>
                </ul>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Indicators</h6>
            </div>
            <div class="card-body">
                <div id="accordion">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Compete Indicators
                        </button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        @foreach ($complete as $value)
                            <ul class="list-group">
                              <li class="list-group-item">{{$value->name}}. {{$value->description}}</li>
                            </ul>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Incomplete Indicators
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                         @foreach ($incomplete as $value)
                            <ul class="list-group">
                              <li class="list-group-item">{{$value->name}}. {{$value->description}}</li>
                            </ul>
                        @endforeach
                      </div>
                    </div>
                  </div>
            </div>
        </div>

    </div>
</div>

@endsection
