<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function index()
    {
        $user=auth()->user();
        return view('cv.resume', compact('user'));
    }

    public function download()
    {
        $user=auth()->user();

        $pdf= \PDF::loadView('cv/resume', compact('user'));

        return $pdf->download('resume.pdf');
    }
}
