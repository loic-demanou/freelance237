<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}

    <style>
        .active{
            text-decoration: underline;
            font-weight: bold;
        }
    </style>
    {{-- <title>Document</title> --}}
</head>
<body>
    <nav aria-label="breadcrumb" class="container mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item {{ request()->is('user-detail') ? 'active' : '' }}"><a href="{{ route('user-detail.index') }}">Heading</a></li>
            <li class="breadcrumb-item {{ request()->is('education') ? 'active' : '' }}"><a href="{{ route('education.index') }}">Education</a></li>
            <li class="breadcrumb-item {{ request()->is('experience') ? 'active' : '' }}"><a href="{{ route('experience.index') }}">Work history</a></li>
            <li class="breadcrumb-item {{ request()->is('skill') ? 'active' : '' }}"><a href="{{ route('skill.index') }}">Skills</a></li>
        </ol>
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
        preview of cv <i class="far fa-file-pdf ml-3" style="font-size: 20px"></i>
        </button>

<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="{{ route('resume.index') }}" width="100%" height="900"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                Close
                </button>
                <a href="{{ route('resume.download') }}" class="btn btn-primary">Download</a>
            </div>
            </div>
        </div>
        </div>


    </nav>
    {{-- @yield('cv_navigation') --}}
    <script src="{{ asset('js/mdb.min.js') }}"></script>
</body>
</html>
