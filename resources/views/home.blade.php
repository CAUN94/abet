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
                <h5>Not Start</h5>
                <div class="row">
                    <!-- Nav Item - Pages Collapse Menu -->
                    @foreach(Auth::user()->getNotStartedReports() as $report)
                        @foreach($report->Course()->getCategoryStart() as $category)
                            <div class="col-xl-4 col-md-4 mb-4">
                              <div class="card border-left-danger shadow h-100 py-2">
                                <a href="/report/{{$report->id}}">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{$report->Course()->code}}</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$report->Course()->name}}</div>
                                          <div class="text-xs mt-2 mb-0 font-weight-bold text-gray-800">
                                            {{$category->name}}
                                            {{$category->description}}
                                        </div>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach

                </div>
                <hr>
                <h5>In Progress</h5>
                <div class="row">
                    @foreach(Auth::user()->getStartedReports() as $report)
                            @foreach($report->Course()->getCategoryProgress() as $category)
                                <div class="col-xl-4 col-md-4 mb-4">
                                  <div class="card border-left-warning shadow h-100 py-2">
                                    <a href="/reportprogress/{{$report->id}}">
                                        <div class="card-body">
                                          <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{$report->Course()->code}}</div>
                                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$report->Course()->name}}</div>
                                              <div class="text-xs mt-2 mb-0 font-weight-bold text-gray-800">
                                                {{$category->name}}
                                                {{$category->description}}
                                            </div>

                                            </div>
                                          </div>
                                        </div>
                                    </a>
                                  </div>
                                </div>
                            @endforeach
                    @endforeach
                </div>
                <hr>
                <h5>Done</h5>
                <div class="row">
                    @foreach(Auth::user()->getFinishReports() as $report)
                        @foreach($report->Course()->getCategoryDone() as $category)
                            <div class="col-xl-4 col-md-4 mb-4">
                              <div class="card border-left-success shadow h-100 py-2">
                                <a href="/finishprogress/{{$report->id}}">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$report->Course()->code}}</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$report->Course()->name}}</div>
                                          <div class="text-xs mt-2 mb-0 font-weight-bold text-gray-800">
                                            {{$category->name}}
                                            {{$category->description}}
                                        </div>

                                        </div>
                                      </div>
                                    </div>
                                </a>
                              </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-4 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Indicators</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach(Auth::user()->getCategory() as $category)
                        <li class="list-group-item">
                            {{$category->name}}. {{$category->description}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection
