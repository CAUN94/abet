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
                        {{-- @foreach($report->Course()->getCategory() as $category) --}}
                            <div class="col-xl-6 col-md-6 mb-4">
                              <div class="card border-left-danger shadow h-100 py-2">
                                <a href="/report/{{$report->id}}">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{$report->Course()->code}}</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$report->Course()->name}}</div>
                                          <div class="text-xs mt-2 mb-0 font-weight-bold text-gray-800">
                             {{--                {{$report->getCategory()->name}}
                                            {{$report->getCategory()->description}} --}}
                                        </div>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                            </div>
                        {{-- @endforeach --}}
                    @endforeach

                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-4 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{-- Indicators --}}</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
{{--                     @foreach(Auth::user()->getCategory() as $category)
                        <li class="list-group-item">
                            {{$category->name}}. {{$category->description}}
                        </li>
                    @endforeach --}}
                </ul>
            </div>
        </div>

    </div>
</div>

@endsection
