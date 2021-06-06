<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-green-600 font-semibold text-xl">CV Builder</p>
        </div>
    </header>
    @include('layouts.cv_nav')

    <div class="container">
        <h2 class="mt-3">Work summary</h2>
        
        @foreach ($experiences as $experience)
            <div class="card" style="border: 1px solid rgb(196, 190, 190)">
                <div class="card-body">
                    <h4 class="card-title">{{ $experience->job_title }}  ({{ $experience->start_date }} to {{ $experience->end_date }})</h4>
                    <ul>
                        <li>{{ $experience->employer }}</li>
                        <li>{{ $experience->city }}, {{ $experience->state }}</li>
                        @if ($experience->description)
                        <li>
                            <strong> Description:</strong> {!! $experience->description !!}
                        </li>
                        @endif
                    </ul>
                    <a href="{{ route('experience.edit', $experience) }}" class="btn btn-sm btn-primary">Edit</a>
                    {{-- <a href="{{ route('experience.delete', $experience) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                    <form action="{{ route('experience.destroy', $experience) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete"
                        onclick="return confirm('Are you sure ?');">
                    </form>
                </div>
            </div>
            <span class="text-gray-100">.</span>

        @endforeach
        <a href="{{ route('experience.create') }}" class="btn btn-primary mt-3">Add another experience</a>
        <a href="{{ route('skill.index') }}" class="btn btn-primary mt-3">Skills<i class="fas fa-angle-double-right ml-5"></i></a>
    </div>
    
</x-app-layout>