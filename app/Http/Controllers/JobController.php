<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        //$jobs=Job::online()->latest()->get();
        // $proposal=DB::table('proposals')->where('user_id')->select();

        $jobs=Job::latest()->get();

        // return view('jobs.index', compact('jobs'), compact('proposal'));
        return view('jobs.index', [
            'jobs'=>$jobs,
        ]);
    }

    public function show(Job $id)
    {
        return view('jobs.show', [
            'jobs'=>$id
            
        ]);
    }

    public function create()
    {
        return view("jobs.create");
    }

    public function store(Request $request, User $user)
    {
        request()->validate([
            'title' => ['required', 'string','min:5' ,'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required'],
            'price' => ['required', 'integer'],
            // 'attachment' => ['required', 'file']
        ]);
        // $pdf=request('attachment')->store('pdf', 'public');

        $jobs= Job::create([
            'title'=> request('title'),
            'description'=> request('description'),
            'status'=> request('status'),
            // 'attachment'=> $pdf,
            'price'=> request('price'),
            'user_id'=> auth()->user()->id,


        ]);
        Flashy::message('New mission created !');
        // session()->flash('message', 'created mission');
        // session()->flash('notification.type', 'success');



        return redirect()->route('jobs.index', compact('jobs'));

    }

    public function update(Request $request , $id)
    {
        request()->validate([
            'title' => ['required', 'string','min:5' ,'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required'],
            'price' => ['required', 'integer'],
            // 'attachment' => ['required', 'file']
        ]);
        $jobs= DB::table('jobs')
        ->where('id', $id)
        ->update([
            'title'=> request('title'),
            'description'=> request('description'),
            'status'=> request('status'),
            'price'=> request('price'),
            // 'description'=> request('description'),
        ]);
        flashy("Edited job");
        return redirect()->route('dashboard', compact('jobs'));

        

    }

    public function edit($id)
    {
        $jobs=Job::findOrFail($id);
        return view("jobs.edit", compact('jobs'));
    }

    public function delete($id)
    {
        // $job= DB::delete('delete jobs where id = ?', ['jobs->id']);
        $job=DB::table('jobs')->where('id', $id)->delete();
        // $prod=DB::table('products')->where('id', $id)->delete();
        Flashy::message('Mission deleted !');
        // session()->flash('message', 'Deleted mission');
        // session()->flash('notification.type', 'danger');

        return redirect()->route('dashboard');



    }
}
