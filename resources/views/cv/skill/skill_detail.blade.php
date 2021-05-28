<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-green-600 font-semibold text-xl">CV Builder</p>
        </div>
    </header>
    @include('layouts.cv_nav')

    <div class="container">
        <h2 class="mt-3">Skills summary</h2>
        
        @foreach ($skills as $skill)
            <div class="card" style="border: 1px solid rgb(196, 190, 190)">
                <div class="card-body">
                    <h4 class="card-title">{{ $skill->name }}  ({{ $skill->rating }})</h4>
                    <a href="{{ route('skill.edit', $skill) }}" class="btn btn-sm btn-primary">Edit</a>
                    {{-- <a href="{{ route('skill.delete', $skill) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                    <form action="{{ route('skill.destroy', $skill) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete"
                        onclick="return confirm('Are you sure ?');">
                    </form>
                </div>
            </div>
            <span class="text-gray-100">.</span>

        @endforeach
        <a href="{{ route('skill.create') }}" class="btn btn-primary mt-3">Add another skill</a>
    </div>
    
</x-app-layout>