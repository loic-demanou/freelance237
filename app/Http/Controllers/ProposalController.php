<?php

namespace App\Http\Controllers;

use App\Notifications\JobAffected;
use App\Models\Conversation;
use App\Models\CoverLetter;
use App\Models\Job;
use App\Models\User;
use App\Models\Message;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidatedProposalMail;
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


    public function confirm(Request $request, User $user)
    {
        $proposal=Proposal::findOrFail($request->proposal);
        $proposal->fill(['validated' =>1]);
        if ($proposal ->isDirty()) {

            // $userDuJobEmail= $proposal->job->user->email;
            // dump($userDuJob, $userDuJobEmail);
            // die();
            $proposal->save();
            // $user->notify(new JobAffected($proposal));
            $userQuiASendProposal= $proposal->user->email;
            $titleDuJob= $proposal->job->title;
            $userDuJob= $proposal->job->user;
            // try {
            //     Mail::to($userQuiASendProposal)->send(new ValidatedProposalMail($userDuJob, $titleDuJob));

            // } catch (\Throwable $th) {
            //     throw $th->exeption;
            // }


            $conversation = Conversation::updateOrCreate([
                'from' => auth()->user()->id,
                'to' => $proposal->user->id,
                'job_id' => $proposal->job_id
            ]);

            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'content' => "Salut, j'ai validé votre offre !"
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

            $conversation = Conversation::updateOrCreate([
                'from' => auth()->user()->id,
                'to' => $proposal->user->id,
                'job_id' => $proposal->job_id
            ]);


            // $conversation = Conversation::update([
            //     'from' => auth()->user()->id,
            //     'to' => $proposal->user->id,
            //     'job_id' => $proposal->job_id
            // ]);


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
