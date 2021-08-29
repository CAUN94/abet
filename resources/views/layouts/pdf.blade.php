<html>
<head>
    <title>Codigo Curso</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            background-color: #009fe3;
            color: white;
            padding: 0 3cm;
            line-height: 20px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #009fe3;
            color: white;
            padding: 0 2cm;
            line-height: 35px;
        }

        .d-g{
            display: inline;
            justify-content: space-between;
            width: 80%;
        }

        .d-1 {
            float: left;
            width: 60%;
        }

        .d-2 {
            float: left;
            width: 20%;
        }


    </style>
</head>
<body>
<header>
    <h3><strong>{{$course->name}}
        {{$course->description}}</strong><br>Assessment Sheet
        {{$category->name}}
        {{$category->description}}</h3>
</header>

<main>
    <div style="position:absolute;  width:400px;">
        <p><strong>Professor Team:</strong> {{$report->ProfessorTeam}}</p>
        <p><strong>Result:</strong> {{$report->ProfessorTeam}}</p>
        <p><strong>Expected:</strong> {{$report->Expected}}%</p>
        <p><strong>Proposal:</strong> {{$report->Proposal}}%</p>
        <p><strong>Purpose Measure:</strong><br>{{$report->PurposeMeasure}}</p>
        <p><strong>Results:</strong><br>{{$report->Results}}</p>
        <p><strong>Improce Scores:</strong><br>{{$report->ImproceScores}}</p>
        <hr>
        <p>Mastery: {{$report->Mastery()[1]}}% (count: {{$report->Mastery()[0]}})</p>
        <p>Proficient: {{$report->Proficient()[1]}}% (count: {{$report->Proficient()[0]}})</p>
        <p>Development: {{$report->Development()[1]}}% (count: {{$report->Development()[0]}})</p>
        <p>Beginner: {{$report->Beginner()[1]}}% (count: {{$report->Beginner()[0]}})</p>

    </div>
        <div style="margin-left:470px;">
                <p>Semester: {{$course->year}}-{{$course->semester}}</p>
                <p>Course: {{$course->name}}</p>
                <p>Coordinator: {{$report->User()->name()}}</p>
                <p>Indicator: {{$report->Category()->name}} {{$report->Category()->description}}</p>
                <p>Measurement Instrument: {{$report->MeasurementInstrument}}</p>
                <p>Assessment Method Detail: {{$report->AssessmentMethodDetail}}</p>
                <p>Min Score: {{$report->MinScore}}</p>
                <p>Max Score: {{$report->MaxScore}}</p>
                <p>Student: {{$report->Students()}}</p>
        </div>
    </div>

</main>

<footer>
    <h1>Abet UAI</h1>
</footer>
</body>
</html>
