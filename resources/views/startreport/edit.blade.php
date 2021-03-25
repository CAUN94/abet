@extends('layouts.admin')

@section('main-content')

    <div class="row">

        <!-- Content Column -->
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
                  <form method="POST" action="/report/{{$report->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @if ($errors->any())
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="form-row">
                        <div class="col">
                          <input type="text" name="measurement_instrument" class="form-control" placeholder="MEASUREMENT INSTRUMENT">
                        </div>
                        <div class="col">
                          <input type="text" name="assessment_method_detail" class="form-control" placeholder="ASSESSMENT METHOD DETAIL">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col">
                          <input type="number" name="minscore" class="form-control" placeholder="Minscore:">
                        </div>
                        <div class="col">
                          <input type="number" name="maxscore" class="form-control" placeholder="Maxcore:">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Subir archivo de notas</label>
                      <input type="file" name="excel" class="form-control-file" id="field_path">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>

        </div>

        <div class="col-lg-4 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Info</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Semester:</b> {{$course->year}}-{{$course->semester}}</li>
                        <li class="list-group-item">Course: {{$course->name}}</li>
                        <li class="list-group-item">Coordinator: {{$report->User()->name()}}</li>
                        <li class="list-group-item">Indicator: {{$report->Category()->name}} {{$report->Category()->description}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
