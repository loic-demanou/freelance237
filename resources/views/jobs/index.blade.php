<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            <span class="text-green-600">Available jobs</span>
            @if (auth()->user() && auth()->user()->role_id==2)
            <a href="{{ route('jobs.create') }}" class="btn btn-primary" style="float:right;">
                <i class="fas fa-plus mr-2"></i>Create a new job</a>
                
            @else
                
            @endif

        </h2>
    </x-slot>
    <div class="container mt-3">
    {{-- <div class="w-1/4 mb-3">
        <x-input.text wire:model="search" type="text" placeholder="search a job...">
        </x-input.text>
        <input class="form-control" wire:model="search" type="text" placeholder="search a job...">

    </div> --}}
        <div class="row">
            @foreach ($jobs as $job)
                <livewire:job :job="$job" />
            @endforeach
        </div>
        {{ $jobs->links() }} 
    </div>
    

</x-app-layout>
