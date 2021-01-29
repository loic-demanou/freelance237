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
        $jobs=Job::latest()->get();


        return view('jobs.index', compact('jobs'));
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

    public function store(User $user)
    {
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'status' => ['required'],
        ]);
        $jobs= Job::create([
            'title'=> request('title'),
            'description'=> request('description'),
            'status'=> request('status'),
            'price'=> request('price'),
            'user_id'=> auth()->user()->id,


        ]);
        Flashy::message('New mission created !');
        session()->flash('message', 'created mission');
        session()->flash('notification.type', 'success');



        return redirect()->route('jobs.index');

    }

    public function delete($id)
    {
        // $job= DB::delete('delete jobs where id = ?', ['jobs->id']);
        $job=DB::table('jobs')->where('id', $id)->delete();
        // $prod=DB::table('products')->where('id', $id)->delete();
        Flashy::message('Mission deleted !');
        session()->flash('message', 'Deleted mission');
        session()->flash('notification.type', 'danger');

        return redirect()->route('dashboard');



    }
}
