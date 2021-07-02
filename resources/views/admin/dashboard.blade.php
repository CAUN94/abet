@extends('layouts.admin')

@section('main-content')
<style>
    figure {
        margin: 0 20px;
        max-width: 1100px;
        position: relative;
    }
    .graphic {
        padding-left: 60px;
    }
    .row {
        margin-bottom: 1.5em;
    }
    @keyframes expand {
        from {width: 0%;}
        to {width: 100%;}
    }
    @media screen and (min-width: 768px) {
        @keyframes expand {
            from {width: 0%;}
            to {width: calc(100% - 75px);}
        }
    }
    .chart {
        overflow: hidden;
        animation: expand 1.5s ease forwards;
    }
    .row + .row .chart {
        animation-delay: .2s;
    }
    .row + .row + .row .chart {
        animation-delay: .4s;
    }
    .block {
        display: block;
        height: 100px;
        color: #fff;
        font-size: .75em;
        float: left;
        background-color: #d9534f;
        position: relative;
        overflow: hidden;
        opacity: 1;
        transition: opacity, .3s ease;
        cursor: pointer;
    }
    .block:nth-of-type(2),
    .legend li:nth-of-type(2):before {
        background-color:#0275d8;
    }
    .block:nth-of-type(3),
    .legend li:nth-of-type(3):before {
        background-color: #5cb85c;
    }
    .block:nth-of-type(4),
    .legend li:nth-of-type(4):before {
        background-color: #f0ad4e;
    }
    .block:hover {
        opacity: .65;
    }
    .value {
        display: block;
        line-height: 1em;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%);
    }
    .x-axis {
        text-align: center;
        padding: .2em 0 2em;
    }
    .y-axis {
        height: 30px;
        transform: translate(-32px,170px) rotate(270deg);
        position: absolute;
        left: 20;
    }
    .legend {
        margin: 0 auto;
        padding: 0;
        font-size: .9em;
    }
    .legend li {
        display: inline-block;
        padding: .25em 1em;
        line-height: 1em;
    }
    .legend li:before {
        content: "";
        margin-right: .5em;
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: #d9534f;
    }

</style>
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
            </div>
            <div class="card-body">
                <div class="row" id="myDiv">
                    <figure style="width:100%">
                      <div class="graphic" style="width:100%">
                        @foreach($reports as $report)
                            <div class="row" style="flex-wrap: nowrap">
                                <span style="width: 20%; display: inline-block;">{{$report->Course()->code}}<br>{{$report->Course()->name}}</span>
                                <div class="chart" style="width:80%; display: inline-block;">
                                    <span class="block" title="Beginning">
                                       <span class="value">{{$report->pb}}%</span>
                                    </span>
                                    <span class="block" title="Development">
                                       <span class="value">{{$report->pd}}%</span>
                                    </span>
                                    <span class="block" title="Proficient">
                                       <span class="value">{{$report->pp}}%</span>
                                    </span>
                                    <span class="block" title="Mastery">
                                       <span class="value">{{$report->pm}}%</span>
                                    </span>

                                </div>
                            </div>
                        @endforeach
                      </div>

                      <div class="x-axis">
                        <h3>Levels</h3>
                        <ul class="legend">
                          <li>Beginning</li>
                          <li>Development</li>
                          <li>Proficient</li>
                          <li>Mastery</li>
                        </ul>
                      </div>

                    </figure>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $('.value').each(function() {
        var text = $(this).text();
        $(this).parent().css('width', text);
    });

    $('.block').tooltip();
</script>
@endsection
