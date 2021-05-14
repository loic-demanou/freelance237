<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p class="text-green-600">Job seekers list</p>
        </h2>
    </x-slot>

    <div class="container form-group my-5">
        <form action="{{ route('candidates.search') }}" class="d-flex">
            <label class="mr-5 ml-20" style="font-weight: 500">Find job seeker</label>
            <input type="text" name="q" value="{{ request()->q ?? '' }}" class="form-control w-50 ml-5">
            <button class="btn btn-success ml-1">search</button>
        </form>

        @if (request()->input('q'))
            <h6 class="ml-20 mt-2">{{ $candidates->total() }} result(s) for the search "{{ request()->q }}"</h6>
        @endif
    </div>

    @if ($candidates)

        <div class="container">
            <div class="row mx-5 mt-3">
                @foreach ($candidates as $candidate)
                    <div class="col-md-2 px-3 py-3 mb-5 hover:shadow-lg border border-gray-500 bg-gray-200">
                        <img src="{{ asset('storage') . '/' .$candidate->profile_photo_path }}"
                        class="rounded-circle ml-4" style="width: 125px; height: 125px">
                
                        <strong class="text-xl mt-1"> {{" ". $candidate->name }} </strong>
                        <p>Member since {{ $candidate->created_at->format('Y/m/d') }}</p>
                    
                    </div>

                    <div class="col-10 px-3 py-3 mb-5 hover:shadow-lg border border-gray-500 bg-gray-200">
                            <div class="text-xl font-bold text-green-600 mb-1">{{ $candidate->presentation }}</div>
                        @if ((strlen($candidate->description)>200))
                            <p class="text-md text-gray-800 mx-3 py-2" style="">{{ substr($candidate->description, 0, 200) .'...'}}</p>
                        @else
                            <p class="text-md text-gray-800 py-2" style="">{{ substr($candidate->description, 0, 200) }}</p>
                        @endif
                    
                        <span class="text-sm text-gray-600 mr-5"><i class="fa fa-money-bill mr-3 " style="font-size:20px"></i>
                            {{ number_format( $candidate->rate, 2, ",", " " ) }} Fcfa/Hour
                        </span>
                        <div><a href="{{ route('message.create', $candidate->id) }}" class="btn btn-success mt-3"><i class="fas fa-comments"><span class="ml-3">Start discussion</span></i></a></div>
                    </div>
            
                @endforeach
            </div>
            {{ $candidates->links() }} 
        </div>

    @endif


</x-app-layout>