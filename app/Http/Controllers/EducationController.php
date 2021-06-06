<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations= auth()->user()->education;
        return view('cv.education.education_detail', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.education.education_create');
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
            'school_name'=>['required', 'min:3'],
            'school_location' => ['required', 'min:3'],
            'degree' => ['required', 'min:3'],
            'field_of_study' => ['nullable'],
            'graduation_start_date' => ['date'],
            'graduation_end_date' => ['date'],

        ]);
        auth()->user()->education()->create($request->all());
        flashy("New education added");

        return redirect()->route('education.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        return view('cv.education.education_edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'school_name'=>['required', 'min:3'],
            'school_location' => ['required', 'min:3'],
            'degree' => ['required', 'min:3'],
            'field_of_study' => ['nullable'],
            'graduation_start_date' => ['date'],
            'graduation_end_date' => ['date'],

        ]);
        $education->update($request->all());
        flashy("Education updated !");

        return redirect()->route('education.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->delete();
        flashy("Education deleted");

        
        return back();
    }
}
