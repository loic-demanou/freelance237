<div>
    <div class="px-3 py-5 mb-3 hover:shadow-lg rounded border border-gray-500 bg-gray-200">
        <div class="flex justify-between">
            <h2 class="text-xl font-bold text-green-600">{{ $job->title }}</h2>
            <button class="h-6 w-6 text-gray-600 focus:outline-none" wire:click="addLike">
                <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $job->isLiked() ? 'green' : 'white' }}" viewBox="0 0 24 24" stroke="green">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>
        <p class="text-md text-gray-800">{{ $job->description }}</p>
        <div class="flex items-center">
            <span class="h-2 w-2 bg-green-400 rounded-full mr-1"></span>
            {{-- <a style="font-weight:bold" href="{{ route('jobs.show', $job->id) }}">Show the mission</a> --}}
            <a  href="{{ route('jobs.show', $job->id) }}" class="bg-green-500 text-xm py-2 px-2 mt-2 mb-3 inline-block text-white hover:bg-green-300 hover:text-green-500 duration-200 transition rounded">Show the mission</a>
        </div>
        <span class="text-sm text-gray-600">{{ number_format( $job->price, 2, ",", " " ) }} Fcfa</span>
        
    </div>
</div>
