<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Job;
class Search extends Component
{
    public String $search='';
    public $jobs=[];
    public int $selectedIndex=0;

    public function incrementIndex()
    {
        if ($this->selectedIndex===count($this->jobs)-1) {
            $this->selectedIndex=0;
            return;
        }
        $this->selectedIndex++;
    }

    public function decrementIndex()
    {
        if ($this->selectedIndex===0) {
            $this->selectedIndex=(count($this->jobs)-1);
            return;
        }
        $this->selectedIndex--;
    }

    public function showJob()
    {
        if ($this->jobs->count()>0) {
            return redirect()->route('jobs.show', [$this->jobs[$this->selectedIndex]['id']]);
        }
    }

    public function updatedSearch()
    {

        $words= '%'. $this->search . '%';

        if (strlen($this->search)>2) {
            $this->jobs = Job::where('title', 'like', $words)
            ->orWhere('description', 'like', $words)
            ->get();
        }
    }

    public function resetIndex()
    {
        $this->reset('selectedIndex');
    }

    public function render()
    {
        return view('livewire.search');


        // [
        //     'jobs'=>Job::search('title', $this->search)->online()->latest()->get()

    }
}
