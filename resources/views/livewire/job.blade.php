    <div class="col-md-6 col-sm-12 col-lg-12">
        <div class="px-3 py-3 mb-5 hover:shadow-lg rounded border border-gray-500 bg-gray-200">
            <span class="text-sm text-gray-600 d-flex mb-2">
                
                <img src="{{ asset('storage') . '/' .$job->user->profile_photo_path }}" style="width: 25px; height: 25px"
                class="rounded-circle mr-3" alt="profile_photo">

                <strong class="mr-3"> {{" ". $job->user->name }} </strong>
                {{ $job->created_at->diffForHumans() }}
                
            </span>
            <div class="flex justify-between">
                <div class="text-xl font-bold text-green-600">{{ $job->title }}
                    @if ($job->status==1)
                        <span class="badge rounded-pill bg-success ml-3" style="font-size:11px">Available</span>
                    @else
                        <span class="badge rounded-pill bg-danger ml-3" style="font-size:11px">Unavailable</span>
                    @endif
                </div>
                <button class="h-6 w-6 text-gray-600 focus:outline-none" wire:click="addLike">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $job->isLiked() ? 'green' : 'white' }}"
                        viewBox="0 0 24 24" stroke="green">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
                
            </div>
            @if ((strlen($job->description)>200))
                <p class="text-md text-gray-800 mx-3 py-2" style="">{{ substr($job->description, 0, 200) .'...'}}</p>
            @else
                <p class="text-md text-gray-800 py-2" style="">{{ substr($job->description, 0, 200) }}</p>
            @endif

            {{-- <div class="flex items-center">
                @if ($job->status==1)
                    <span class="h-3 w-3 bg-green-400 rounded-full mr-3"></span>
                    <p class="mr-4 text-gray-600">Available</p>
                @else
                    <span class="h-3 w-3 bg-red-500 rounded-full mr-3"></span>
                    <p class="mr-4 text-gray-600"">Unavailable </p>
                @endif
                <a style=" font-weight:bold" href="{{ route('jobs.show', $job->id) }}">Show the mission</a>
            </div> --}}

            <span class="text-sm text-gray-600 mr-5"><i class="fa fa-money-bill mr-3 " style="font-size:20px"></i>
                {{ number_format( $job->price, 2, ",", " " ) }} Fcfa
            </span>
            <span class="ml-5">
                <a href="{{ route('jobs.show', $job->id) }}" 
                    class="text-green-500" style="text-decoration: underline;">Show more
                </a>
            </span>
            <div class="text-sm text-gray-600 mt-2 ">There is {{ $job->proposals->count() }} @choice('proposal|proposals',
                $job->proposals) for this mission
            </div>

        </div>
    </div>
