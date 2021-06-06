<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $proposals = Proposal::all();
        $jobs= Job::all();
        $users = User::all();
        return view('Admin.dashboard', compact('users', 'jobs', 'proposals'));
    }

    public function getUsers()
    {
    }
}
