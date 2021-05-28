<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-green-600 font-semibold text-xl">CV Builder</p>
        </div>
    </header>
    @include('layouts.cv_nav')
    {{-- <div class="container">
        <h2>Create your cv here </h2>
        <a href="{{ route('user-detail.create') }}" class="btn btn-primary">Build my cv</a>
    </div> --}}

    <div class="container">
        <h2 class="mt-3">Education summary</h2>
        
        @foreach ($educations as $education)
            <div class="card" style="border: 1px solid rgb(196, 190, 190)">
                <div class="card-body">
                    <h4 class="card-title">{{ $education->degree }} option {{ $education->field_of_study }}, obtain in 
                        {{ $education->school_name }} of {{ $education->school_location }}
                        ({{ $education->graduation_start_date }} - {{ $education->graduation_end_date }})</h4>
                    <a href="{{ route('education.edit', $education) }}" class="btn btn-sm btn-primary">Edit</a>
                    {{-- <a href="{{ route('education.delete', $education) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                    <form action="{{ route('education.destroy', $education) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete"
                        onclick="return confirm('Are you sure ?');">
                    </form>
                </div>
            </div>
            <span class="text-gray-100">.</span>

        @endforeach
        <a href="{{ route('education.create') }}" class="btn btn-primary mt-3">Add another education</a>
        <a href="{{ route('experience.index') }}" class="btn btn-primary mt-3">Experience<i class="fas fa-angle-double-right ml-5"></i></a>

    </div>
    
</x-app-layout>