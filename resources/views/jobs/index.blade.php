<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            <span class="text-green-600">Available jobs</span>
            @if (auth()->user() && auth()->user()->role_id==2)
            <a href="{{ route('jobs.create') }}" class="btn btn-primary" style="float:right;">
                <i class="fas fa-plus mr-2"></i>Create a new job</a>
            @endif
        </h2>
    </x-slot> --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <span class="text-indigo-600 font-semibold text-xl">List of jobs</span>
            @if (auth()->user() && auth()->user()->role_id==2)
            <a href="{{ route('jobs.create') }}" style="float:right;">
            <x-jet-button><i class="fas fa-plus mr-2"></i>Create a new job</x-jet-button></a>
            
            @endif

            @if (auth()->user() && auth()->user()->role_id==1)
            <a href="{{ route('jobs.create') }}" style="float:right;">
                <x-jet-button><i class="fas fa-plus mr-2"></i>Make my CV</x-jet-button></a>
            @endif
        </div>
    </header>

    <div class="container my-3">
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
