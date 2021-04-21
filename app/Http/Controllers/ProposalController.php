<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\CoverLetter;
use App\Models\Job;
use App\Models\Message;
use App\Models\Proposal;
use Illuminate\Http\Request;

use MercurySeries\Flashy\Flashy;


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


    // public function delete($id)
    // {
    //     $job=DB::table('proposals')->where('id', $id)->delete();
    //     // $prod=DB::table('products')->where('id', $id)->delete();
    //     // $proposal= DB::delete('delete proposals where id = ?', [$id]);
    //     Flashy::message('Mission deleted !');

    // }



    public function confirm(Request $request)
    {
        $proposal=Proposal::findOrFail($request->proposal);
        $proposal->fill(['validated' =>1]);
        if ($proposal ->isDirty()) {
            
            $proposal->save();

            $conversation = Conversation::create([
                'from' => auth()->user()->id,
                'to' => $proposal->user->id,
                'job_id' => $proposal->job_id
            ]);

            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'content' => "Salut, jai validé votre offre !"
            ]);
            
            Flashy::message('Validated proposal !');

            return redirect()->route('dashboard');
        }


    }

    public function cancel(Request $request){
        $proposal=Proposal::findOrFail($request->proposal);
        $proposal->fill(['validated' =>0]);
        if ($proposal ->isDirty()) {
            
            $proposal->save();

            $conversation = Conversation::create([
                'from' => auth()->user()->id,
                'to' => $proposal->user->id,
                'job_id' => $proposal->job_id
            ]);

            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'content' => "Salut, et encore merci pour votre poposition mais jai décliné votre offre !"
            ]);
            
            Flashy::message('Proposal refused !');
            return redirect()->route('dashboard');

        }


    }

    
}
