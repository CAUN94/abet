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
                  <form method="POST" action="/reportprogress/{{$report->id}}">
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
                          <strong>Professor Team</strong>
                          <input type="text" name="ProfessorTeam" class="form-control" placeholder="Name 1,Name 2,Name 3">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col">
                            <select name="result" class="custom-select">
                              <option disabled selected hidden>Result achieved?</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                              <option value="Somewhat">Somewhat</option>
                            </select>
                        </div>
                        <div class="col">
                          <input type="number" name="expected" class="form-control" placeholder="Expected Level">
                        </div>
                        <div class="col">
                          <input type="number" name="proposal" class="form-control" placeholder="Level Proposal">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                      <div class="col">
                         <strong> What is the purpose of measure? Specify at a course level and the expected results. Use the Performance Indicator as base.</strong>
                          <textarea class="form-control" name="purposemeasure" id="PurposeMeasure" rows="3"></textarea>
                      </div>
                    </div>
                    <hr>
                     <div class="form-row">
                      <div class="col">
                        <strong>Why are the results better or worse? After evaluating the obtained results, explain why the results are different from the previous semester</strong>
                        <textarea class="form-control" name="results" id="Results" rows="3"></textarea>
                      </div>
                    </div>
                    <hr>
                    <div class="form-row">
                      <div class="col">
                        <strong>How will you improve scores on this measure? After evaluating the obtained results, What actions should be taken to improve these results in the future?</strong>
                        <textarea class="form-control" name="ImproceScores" id="ImproceScores" rows="3"></textarea>
                      </div>
                    </div>
                    <hr>
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
                        <li class="list-group-item">Measurement Instrument: {{$report->MeasurementInstrument}}</li>
                        <li class="list-group-item">Assessment Method Detail: {{$report->AssessmentMethodDetail}}</li>
                        <li class="list-group-item">Min Score: {{$report->MinScore}}</li>
                        <li class="list-group-item">Max Score: {{$report->MaxScore}}</li>
                        <li class="list-group-item">Student: {{$report->Students()}}</li>
                    </ul>

                    <?php $data = [
                      [$report->MinScore,$report->MaxScore],
                      [ $report->pb,$report->pd,$report->pp,$report->pm],
                      $report->Students()];
                    ?>

                    <div class="col mr-2 mt-3">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Beginner {{$report->Beginner($data[0],$data[1],$data[2])[0]}}</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$report->Beginner($data[0],$data[1],$data[2])[1]}}%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$report->Beginner($data[0],$data[1],$data[2])[1]}}%"></div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="col mr-2 mt-3">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Development {{$report->Development($data[0],$data[1],$data[2])[0]}}</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$report->Development($data[0],$data[1],$data[2])[1]}}%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{$report->Development($data[0],$data[1],$data[2])[1]}}%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="col mr-2 mt-3">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proficient {{$report->Proficient($data[0],$data[1],$data[2])[0]}}</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$report->Proficient($data[0],$data[1],$data[2])[1]}}%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{$report->Proficient($data[0],$data[1],$data[2])[1]}}%" aria-valuenow="27" aria-valuemin="0" aria-valuemax="30"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col mr-2 mt-3">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mastery {{$report->Mastery($data[0],$data[1],$data[2])[0]}}</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$report->Mastery($data[0],$data[1],$data[2])[1]}}%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$report->Mastery($data[0],$data[1],$data[2])[1]}}%" aria-valuenow="24"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
