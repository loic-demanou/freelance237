<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfProposalSubmitted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->user()->proposals->contains('job_id', $request->job->id)) {   
            flashy()->warning('You cover letter has already been sent !');       
            return redirect()->route('jobs.index');
        }
        return $next($request);
    }
}
