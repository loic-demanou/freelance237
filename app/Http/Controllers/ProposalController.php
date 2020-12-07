<?php

namespace App\Http\Controllers;

use App\Models\CoverLetter;
use App\Models\Job;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Flashy;

class ProposalController extends Controller
{ 
    public $job;
    public function store(Request $request, Job $job)
    {
        $proposal= Proposal::create([
            'job_id' => $job->id,
            'validated' => false
        ]);

        CoverLetter::create([
            'proposal_id' => $proposal->id,
            'content' => $request->input('content'),

        ]);

        Flashy::message('Request sent !');
        
        return redirect()->route('jobs.index');
    }
}
