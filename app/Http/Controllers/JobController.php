<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Livewire\Component;
use MercurySeries\Flashy\Flashy;

class JobController extends Controller
{

    public function dashboard()
    {
        return view('dashboard');
    }

    public $search;

    public function index()
    {
        $jobs=Job::online()->latest()->get();

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $id)
    {
        return view('jobs.show', [
            'jobs'=>$id
            
        ]);
    }
}
