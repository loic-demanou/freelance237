<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userDetail= auth()->user()->detail;
        // dd($userDetail);
        return view('cv.userDetail.user_detail', compact('userDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.userDetail.user_detail_create');
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
            'fullname'=>['required', 'min:4'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:9'],
            'address' => ['nullable'],
            'summary' => ['required'],
        ]);
        // auth()->user()->userDetail()->create($request->all());

        $userDetail= UserDetail::create([
            'fullname' => request('fullname'),
            'email' => request('email'),
            'phone' => request('phone'),
            'address' => request('address'),
            'summary' => request('summary'),
            'user_id' => auth()->user()->id,
        ]);
        // return view('cv.userDetail.user_detail', compact('userDetail'));
        return redirect()->route('user-detail.index', compact('userDetail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetail $userDetail)
    {
        return view('cv.userDetail.user_detail_edit', compact('userDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetail $userDetail)
    {
        $request->validate([
            'fullname'=>['required', 'min:4'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:9'],
            'address' => ['nullable'],
            'summary' => ['required'],
        ]);

        $userDetail->update($request->all());
        return redirect()->route('user-detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        $userDetail->delete();
        return back();

    }
}
