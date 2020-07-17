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
                <div class="row">
                    <!-- Nav Item - Pages Collapse Menu -->
                    @foreach($reports as $report)
                            <div class="col-xl-6 col-md-6 mb-4">
                              <div class="card border-left-{{$report->status()}} shadow h-100 py-2">
                                <a href="/admin/{{$report->id}}">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-{{$report->status()}} text-uppercase mb-1">{{$report->Course()->code}}</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$report->Course()->name}}</div>
                                          <div class="text-xs mt-2 mb-0 font-weight-bold text-gray-800">
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
                <h6 class="m-0 font-weight-bold text-primary">Reportes Status {{'App\Report'::CountAllReports()}}</h6>
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

    </div>
</div>

@endsection
