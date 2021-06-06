<?php

namespace App\Http\Controllers;

use App\Models\AdminJob;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::latest()->paginate(10);
        return view('Admin.job.adminJobs', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminJob  $adminJob
     * @return \Illuminate\Http\Response
     */
    public function show(AdminJob $adminJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminJob  $adminJob
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminJob $adminJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminJob  $adminJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminJob $adminJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminJob  $adminJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminJob $adminJob)
    {
        //
    }
}
