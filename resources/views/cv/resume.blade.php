<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}"> --}}
    <title>CV resume</title>
    <style>
        body{
            font-size: 17px;
        }
        h3{
            font-weight: 100;
            padding: 20px 0;
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
        }
        .container{
            width: 70%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Resume</h3>

            <section class="Heading">
                <h4>{{ $user->detail->fullname }}</h4>
                <p>{{ $user->detail->email }}</p>
                <p>{{ $user->detail->phone }}</p>
                <p>{{ $user->detail->address }}</p>
        
            </section>
            <section class="summary">
                <p>{{ $user->detail->summary }}</p>
            </section>
        
            <section class="Education">
                <h3>Education</h3>
                @foreach ($user->education as $ed)
                    <h4>Degree: {{ $ed->degree }}</h4>
                    <p>School: {{ $ed->school_name }}</p>
                    <p>Start date: {{ $ed->graduation_start_date }}</p>
                    <p>End date: {{ $ed->graduation_end_date }}</p>
                @endforeach
            </section>
            <section class="Work">
                <h3>Work history</h3>
                @foreach ($user->experiences as $work)
                    <h4>Job title: {{ $work->job_title }}</h4>
                    <p>School: {{ $work->employer }}</p>
                    <p>Start date: {{ $work->start_date }}</p>
                    <p>End date: {{ $work->end_date }}</p>
                @endforeach
            </section>
            <section class="Skills">
                <h3>Skills</h3>
                @foreach ($user->skills as $skill)
                    <h4>{{ $skill->name }} ({{ $skill->rating }} out of 5)</h4>
                @endforeach
            </section>        
        </div>
    </div>
</body>
</html>