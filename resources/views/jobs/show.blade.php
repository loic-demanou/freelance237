<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p class="text-green-600">Details</p>
        </h2>
    </x-slot>
    <div class="container mt-3">

            <div class="px-3 py-5 mb-3 hover:shadow-lg rounded border border-gray-500 bg-gray-200">
                <h2 class="text-xl font-bold text-green-600">{{ $jobs->title }}</h2>
                <p class="text-md text-gray-800">{{ $jobs->description }}</p>
                <div class="flex items-center">
                    <span class="h-2 w-2 bg-green-400 rounded-full mr-1"></span>
                    {{-- <a href='#'>Show a mission </a> --}}
                </div>
                
                <span class="text-sm text-gray-600">{{ number_format( $jobs->price, 2, ",", " " ) }} Fcfa</span>

            </div>
    </div>
    <div class="container">
        <section x-data="{open:false}">
            <a href="#" class="btn btn-success mb-2" @click="open=!open"> Check here to submit your application </a>
            <div class="row">
                <form class='form' x-show ="open" x-cloak action="{{ route('proposals.store', $jobs) }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <textarea name="content" cols="60" rows="10" class="form-control" value="{{ old('content') }}"  autocomplete="content" autofocus></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary" >Submit my cover letter</button>

                    </div>
                </form>
            </div>
        </section>
    </div>


</x-app-layout>
