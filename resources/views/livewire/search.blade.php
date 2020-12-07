<div class="inline-block relative "  x-data="{open:true}">
    <input @click.away="{ open= false ; @this.resetIndex();}" @click="{ open = true }"
    class="bg-gray-200 text-gray-700 border-2 focus:outline-none px-2 py-1 mt-3 ml-20 w-56 rounded-full space-x-8 sm:-my-px sm:ml-10 sm:flex"
    type="text" placeholder="search a mission..." wire:model="search"
    wire:keydown.arrow-down.prevent="incrementIndex"
    wire:keydown.arrow-up.prevent="decrementIndex"
    wire:keydown.backspace="resetIndex"
    wire:keydown.enter.prevent="showJob"
    >
    <svg class="w-5 h-5 text-gray-500 absolute top-0 right-0 mr-3 mt-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>

        @if (strlen($search)>2)
        <div class="absolute border bg-gray-100 text-md w-56 mt-1 sm:-my-px sm:ml-10 rounded"
        x-show="open">
                @if (count($jobs)>0)
                @foreach ($jobs as $index=> $job)
                    <p class="p-1 {{ $index===$selectedIndex ? 'text-green-500' : '' }}">{{ $job->title }}</p>
                @endforeach

                @else
                    <span class="text-orange-500 p-1">Not result available for "{{ $search }} "</span>
                @endif

        </div>
        @endif
</div>
