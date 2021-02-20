<div class="col-md-4 col-sm-12 col-lg-4">
    <div class="px-3 py-5 mb-5 hover:shadow-lg rounded border border-gray-500 bg-gray-200">
        <div class="flex justify-between">
            <h2 class="text-xl font-bold text-green-600">{{ $job->title }}</h2>
            <button class="h-6 w-6 text-gray-600 focus:outline-none" wire:click="addLike">
                <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $job->isLiked() ? 'green' : 'white' }}" viewBox="0 0 24 24" stroke="green">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>
        {{-- if (strlen($comment)>50) $comment=substr($comment, 0, 50) --}}
            <p class="text-md text-gray-800" style="">{{ substr($job->description, 0, 40) .'...'}}</p>

        <div class="flex items-center">
            @if ($job->status==1)
                <span class="h-3 w-3 bg-green-400 rounded-full mr-3"></span><p class="mr-4 text-gray-600">Available</p>
            @else
                <span class="h-3 w-3 bg-red-400 rounded-full mr-3"></span><p class="mr-4 text-gray-600"">Unavailable </p>
            @endif
            {{-- <a style="font-weight:bold" href="{{ route('jobs.show', $job->id) }}">Show the mission</a> --}}
            <a  href="{{ route('jobs.show', $job->id) }}" class="bg-green-500 text-xm py-2 px-3 mt-2 mb-3 
                inline-block text-white hover:bg-green-300 hover:text-green-500 duration-200 transition 
                rounded float-right"><i class="far fa-eye mr-3" style="color:black"></i>Show this mission</a>
        </div>
        <span class="text-sm text-gray-600">{{ number_format( $job->price, 2, ",", " " ) }} Fcfa</span>
        <div class="text-sm text-gray-600 mt-2">There is {{ $job->proposals->count() }} @choice('proposal|proposals', $job->proposals) for this mission</div>
        
        
    </div>
</div>

{{-- <div class="card px-3 py-5 mb-3 hover:shadow-lg rounded border border-gray-500 bg-gray-200" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title text-xl font-bold text-green-600">{{ $job->title }}</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <button class="btn btn-primary focus:outline-none" wire:click="addLike">Go somewhere 
        
      </button>
    </div>
  </div> --}}
