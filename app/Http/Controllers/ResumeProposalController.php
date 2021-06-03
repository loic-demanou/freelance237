<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ResumeProposalController extends Controller
{
    public function index()
    {
        // $u=$user->detail;
        // $user= request(proposals()->user->detail);
        // $proposal= Proposal::all();
        // $user=$proposal->user->detail;
        // dd($user);
        // return view('cv.resumeProposal');
    }

    public function download()
    {
        // $proposal=(auth()->user()->jobs);
        // $proposal= auth()->user()->proposals;
        // dd($proposal);

        // $pdf= \PDF::loadView('cv/resumeProposal', compact('proposal'));

        // return $pdf->download('resume.pdf');

    }
}
