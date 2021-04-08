@extends('layouts.admin')

@section('main-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{asset('files/Score_Excel.xlsx')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Ejemplo Excel</a>
    </div>
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
                          <input type="text" name="measurement_instrument" class="form-control" placeholder="Measurement Instrument" required>
                        </div>
                        <div class="col">
                          <input type="text" name="assessment_method_detail" class="form-control" placeholder="Assessment Method Detail" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col">
                          <input type="number" name="minscore" id="min" onchange="myMin()" class="form-control" placeholder="Min Score" required>
                        </div>
                        <div class="col">
                          <input type="number" name="maxscore" id="max" onchange="myAll()" class="form-control" placeholder="Max Score" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row form-inline mb-1">
                        <div class="col text-center">
                            Level
                        </div>
                        <div class="col text-center">
                          Min
                        </div>
                        <div class="col text-center">
                          Max
                        </div>
                        <div class="col">
                          Percentage
                        </div>
                    </div>
                    <hr>
                    <div class="form-row form-inline mb-1">
                        <div class="col text-center">
                            Beginner
                        </div>
                        <div class="col text-center">
                          Min: <span id="min-b">0</span>
                        </div>
                        <div class="col text-center">
                          Max: <span id="max-b">?</span>
                        </div>
                        <div class="col">
                          <input type="number" id="pb" name="pb" class="form-control" onchange="myAll()" placeholder="Porcentaje" value="20" required>
                        </div>
                    </div>
                    <div class="form-row form-inline mb-1">
                        <div class="col text-center">
                            Development
                        </div>
                        <div class="col text-center">
                          Min: <span id="min-d">?</span>
                        </div>
                        <div class="col text-center">
                          Max: <span id="max-d">?</span>
                        </div>
                        <div class="col">
                          <input type="number" id="pd" name="pd" class="form-control" onchange="myAll()" placeholder="Porcentaje" value="30" required>
                        </div>
                    </div>
                    <div class="form-row form-inline mb-1">
                        <div class="col text-center">
                            Proficient
                        </div>
                        <div class="col text-center">
                          Min: <span id="min-p">?</span>
                        </div>
                        <div class="col text-center">
                          Max: <span id="max-p">?</span>
                        </div>
                        <div class="col">
                          <input type="number" id="pp" name="pp" class="form-control" onchange="myAll()" placeholder="Porcentaje" value="30" required>
                        </div>
                    </div>
                    <div class="form-row form-inline mb-1">
                        <div class="col text-center">
                            Mastery
                        </div>
                        <div class="col text-center">
                          Min: <span id="min-m">?</span>
                        </div>
                        <div class="col text-center">
                          Max: <span id="max-m">?</span>
                        </div>
                        <div class="col">
                          <input type="number" id="pm" name="pm" class="form-control" onchange="myAll()"  placeholder="Porcentaje" value="20" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row form-inline mb-1">
                        <div class="col text-center">

                        </div>
                        <div class="col text-center">

                        </div>
                        <div class="col">

                        </div>
                        <div class="col text-center">
                          Total:  <span id='total'>100</span>%
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Upload Excel Notes File</label>
                      <input type="file" name="excel" class="form-control-file" id="field_path" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Continue</button>
                  </form>
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function myMin() {
            var min = document.getElementById("min").value;
            document.getElementById("min-b").innerHTML = min;
        }

        function myAll() {
            var min = parseInt(document.getElementById("min").value);
            var pb = parseInt(document.getElementById("pb").value);
            var pd = parseInt(document.getElementById("pd").value);
            var pp = parseInt(document.getElementById("pp").value);
            var pm = parseInt(document.getElementById("pm").value);
            var max = parseInt(document.getElementById("max").value);

            document.getElementById("min-b").innerHTML = min ;
            document.getElementById("max-b").innerHTML = min + ((max - min)*(pb/100));
            document.getElementById("min-d").innerHTML = min + ((max - min)*(pb/100));
            document.getElementById("max-d").innerHTML = min + ((max - min)*(pb/100)) +  ((max - min)*(pd/100));
            document.getElementById("min-p").innerHTML = min + ((max - min)*(pb/100)) +  ((max - min)*(pd/100));
            document.getElementById("max-p").innerHTML = min + ((max - min)*(pb/100)) +  ((max - min)*(pd/100)) +  ((max - min)*(pp/100));
            document.getElementById("min-m").innerHTML = min + ((max - min)*(pb/100)) +  ((max - min)*(pd/100)) +  ((max - min)*(pp/100));
            document.getElementById("max-m").innerHTML = max;

            document.getElementById("total").innerHTML = pb + pd + pp + pm;

        }
    </script>
@endsection
