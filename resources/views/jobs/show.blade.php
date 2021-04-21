<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p class="text-green-600">Details</p>
        </h2>
    </x-slot>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 col-sm-12">

            <div class="">
                <div class="px-3 py-3 mb-5 hover:shadow-lg rounded border border-gray-500 bg-gray-200">
                    <span class="text-sm text-gray-600 d-flex mb-4">
                        <img src="{{ asset('storage') . '/' .$jobs->user->profile_photo_path }}"
                        class="rounded-circle mr-3" style="width: 25px; height: 25px">
                        <strong class="mr-3"> {{" ". $jobs->user->name }} </strong>
                        {{ $jobs->created_at->diffForHumans() }}
                    </span>
                    <div class="flex justify-between">
                        <div class="text-3xl font-bold text-green-600 mb-1">{{ $jobs->title }}
                            @if ($jobs->status==1)
                                <span class="badge rounded-pill bg-success ml-3" style="font-size:12px">Available</span>
                            @else
                                <span class="badge rounded-pill bg-danger ml-3" style="font-size:12px">Unvailable</span>
                            @endif
                        </div>
                        <button class="h-6 w-6 text-gray-600 focus:outline-none" wire:click="addLike">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $jobs->isLiked() ? 'green' : 'white' }}"
                                viewBox="0 0 24 24" stroke="green">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>
                    @if ((strlen($jobs->description)>200))
                        <p class="text-md text-gray-800 mx-3 py-2" style="">{{ substr($jobs->description, 0, 200) .'...'}}</p>
                    @else
                        <p class="text-md text-gray-800 py-2" style="">{{ substr($jobs->description, 0, 200) }}</p>
                    @endif
                    <span class="text-sm text-gray-600"><i class="fa fa-money-bill mr-3 " style="font-size:20px"></i>
                        {{ number_format( $jobs->price, 2, ",", " " ) }} Fcfa
                    </span>
                    <div class="text-sm text-gray-600 mt-2 ">There is {{ $jobs->proposals->count() }} @choice('proposal|proposals',
                        $jobs->proposals) for this mission
                    </div>
                </div>
            </div>
            

            <section x-data="{open:false}">
            
                <a href="#" class="btn btn-success mb-2" @click="open=!open"> Check here to submit your application </a>
                <div class="row">
                    <form class='form' x-show ="open" x-cloak action="{{ route('proposals.store', $jobs) }}" method="post">
                        @csrf
                        <div class="col-md-12 mb-5">
                            <textarea name="content" cols="60" rows="10" class="form-control" value="{{ old('content') }}"  autocomplete="content" autofocus></textarea>
                        <br>
                        @if ($jobs->status==1)
                            <button type="submit" class="btn btn-primary" >Submit my cover letter</button>
                        @else
                        <button type="submit" class="btn btn-primary" disabled >Submit my cover letter</button>
                        <span class="text-red-500">This mission is unavailable for the moment !</span>
                            {{-- <div class="alert alert-danger"> The mission is unavailable for the moment</div> --}}
                        @endif
    
                        </div>
                    </form>
                </div>
            </section>
    
        </div>
    
        <div class="col-md-4 col-sm-12 mb-4">
            <p style="font-size: 18px" class="mb-3" id="test">About the client</p>
            <div class="d-flex">
                <img src="{{ asset('storage') . '/' .$jobs->user->profile_photo_path }}" width="60px"
                class="rounded-circle mr-3" style="width: 100px; height:100px">
                <ul>
                    <li>
                        <p><strong class="ml-3 text-2xl"> {{" ". $jobs->user->name }} </strong></p><br>
                    </li>
                    <li style ="font-size: 15px"> 
                        Member since {{ $jobs->created_at->format("Y/m/d") }}
                    </li>
                </ul>
            </div>
            <p style="font-weight: bold; font-size: 15px" class="mt-3">{{ $jobs->count(). " " }}jobs posted</p>
        </div>
    </div>


    <script>

        $(function() {
           $('li').click(function (e) { 
               console.log('okkkkkkkkk');       
               
           }); 
        });

    </script>
    
    {{-- <div class="container mt-3">

            <div class="px-3 py-5 mb-3 hover:shadow-lg rounded border border-gray-500 bg-gray-200">
                <h2 class="text-xl font-bold text-green-600">{{ $jobs->title }}</h2>
                <p class="text-md text-gray-800">{{ $jobs->description }}</p>
                <div class="flex items-center">
                    @if ($jobs->status==1)
                        <span class="h-3 w-3 bg-green-400 rounded-full mr-3"></span><p class="mr-4">Available</p>
                    @else
                        <span class="h-3 w-3 bg-red-400 rounded-full mr-3"></span><p class="mr-4">Unavailable </p>
                    @endif
                    <a style="font-weight:bold" href="{{ route('jobs.show', $job->id) }}">Show the mission</a>
                </div>
                        
                <span class="text-sm text-gray-600">{{ number_format( $jobs->price, 2, ",", " " ) }} Fcfa</span>

            </div>
    </div> --}}


</x-app-layout>
