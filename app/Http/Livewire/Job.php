<?php

namespace App\Http\Livewire;

use Livewire\Component;


class Job extends Component
{
    public $job;

    public function addLike()
    {
        if (auth()->check()) {
        auth()->user()->likes()->toggle($this->job->id);        
        }else {
            $this->emit('flash', "Thank you to connect yourself for add a mission to your favori!", 'error');
        }
        
    }

    public function render()
    {
        return view('livewire.job');
    }
}
