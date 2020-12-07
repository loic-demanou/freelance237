<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p class="text-green-600">Available jobs</p>
        </h2>
    </x-slot>
    <div class="container mt-3">
    {{-- <div class="w-1/4 mb-3">
        <x-input.text wire:model="search" type="text" placeholder="search a job...">
        </x-input.text>
        <input class="form-control" wire:model="search" type="text" placeholder="search a job...">

    </div> --}}

        @foreach ($jobs as $job)
            <livewire:job :job="$job" />
        @endforeach
    </div>
    

</x-app-layout>
