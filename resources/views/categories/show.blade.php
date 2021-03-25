@extends('layouts.admin')

@section('main-content')

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-8 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <?php $course = $category->getIndicator()->getCourse()->first() ?>
                        <b>{{$course->name}}
                          {{$course->description}}</b> Assessment Sheet
                          {{$category->name}}
                          {{$category->description}}
                    </h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="/report">
                    @csrf
                    @method('PUT')
                    <input id="{{$course->id}}" name="course_id" type="hidden" value="{{$course->id}}">
                    <input id="{{$category->id}}" name="category_id" type="hidden" value="{{$category->id}}">

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
                          <input type="number" name="maxscore" class="form-control" placeholder="Maxscore: {{$course->maxscore}}">
                        </div>
                        <div class="col">
                          <input type="number" name="students" class="form-control" placeholder="Students: {{$course->students}}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Subir archivo de notas</label>
                      <input type="file" name="field_path" class="form-control-file" id="exampleFormControlFile1">
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
                        <li class="list-group-item">Indicator: {{$category->getIndicator()->name}} {{$category->getIndicator()->description}}</li>
                        <li class="list-group-item">Performance: {{$category->name}} {{$category->description}}</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
