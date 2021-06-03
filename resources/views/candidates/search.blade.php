<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-indigo-600 font-semibold text-xl">Job seekers list</p>
        </div>
    </header>


    <div class="container form-group my-5">
        <form action="{{ route('candidates.search') }}" class="d-flex">
            <label class="mr-5 ml-20" style="font-weight: 500">Find job seeker</label>
            <input type="text" name="q" value="{{ request()->q ?? '' }}" class="form-control ml-5 input-search"
            placeholder="eg: John Doe, web developer..." style="width: 40%">
            {{-- <button class="btn btn-success ml-1">search</button> --}}
            <x-jet-button class="ml-1">Search</x-jet-button>
        </form>
        @if ($errors->has('q'))
        <span class="text-red-400 text-sm block" role="alert">
            <strong>{{ $errors->first('q') }}</strong>
        </span>
        @endif


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
                            <div class="text-xl font-bold text-black-500 mb-1">{{ $candidate->presentation }}</div>
                        @if ((strlen($candidate->description)>200))
                            <p class="text-md text-gray-800 mx-3 py-2" style="">{{ substr($candidate->description, 0, 200) .'...'}}</p>
                        @else
                            <p class="text-md text-gray-800 py-2" style="">{{ substr($candidate->description, 0, 200) }}</p>
                        @endif
                    
                        <span class="text-sm text-gray-600 mr-5"><i class="fa fa-money-bill mr-3 " style="font-size:20px"></i>
                            {{ number_format( $candidate->rate, 2, ",", " " ) }} Fcfa/Hour
                        </span>
                        <div><x-jet-button class="mt-3"><a href="{{ route('message.create', $candidate->id) }}"><i class="fas fa-comments text-white">
                            <span class="ml-3" style="color: white">Start discussion</span></i></a></x-jet-button>
                        </div>                    
                    </div>
            
                @endforeach
            </div>
            {{ $candidates->links() }} 
        </div>

    @endif


</x-app-layout>