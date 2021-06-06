<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences= auth()->user()->experiences;
        return view('cv.experience.experience_detail', compact('experiences'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.experience.experience_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title'=>['required', 'min:3'],
            'employer' => ['required', 'min:3'],
            'city' => ['required'],
            'state' => ['required'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date'],
            'description' => ['nullable', 'max:250'],
        ]);
        auth()->user()->experiences()->create($request->all());
        flashy("New experience added !");


        return redirect()->route('experience.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        return view('cv.experience.experience_edit', compact('experience'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'job_title'=>['required', 'min:3'],
            'employer' => ['required', 'min:3'],
            'city' => ['required'],
            'state' => ['required'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date'],
            'description' => ['nullable'],

        ]);
        $experience->update($request->all());
        flashy("Ewperience updated !");

        return redirect()->route('experience.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        flashy("Ewperience deleted !");

        return back();
    }
}
