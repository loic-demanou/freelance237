<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $candidates= User::latest()->where('role_id', 1)->paginate(10);
        return view('candidates.candidate', compact('candidates'));
    }

    public function search()
    {
        request()->validate([
            'q' => 'required | min:3'
        ]);

        $q= request()->input('q');
        
        $candidates = User::where('name', 'like', "%$q%")
        ->OrWhere('presentation', 'like', "%$q%")
        ->Where('role_id', 1)
        ->paginate(10);
        return view('candidates.search', compact('candidates'));
    }
}
