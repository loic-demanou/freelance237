<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-green-600 font-semibold text-xl">CV Builder</p>
        </div>
    </header>
    @include('layouts.cv_nav')

    <div class="container">
        <h2 class="mt-3">User details summary</h2>
        
            <div class="card" style="border: 1px solid rgb(196, 190, 190)">
                <div class="card-body">
                    @if ($userDetail)
                    <h4 class="card-title">{{ $userDetail->fullname }}</h4>
                    <ul>
                        <li><strong> Email : </strong>{{ $userDetail->email }}</li>
                        <li><strong> Phone : </strong>{{ $userDetail->phone }}</li>
                        @if ($userDetail->address)
                        <li>
                            <strong> Address : </strong> {{ $userDetail->address }}
                        </li>
                        @endif
                    </ul>
                    <a href="{{ route('user-detail.edit', $userDetail) }}" class="btn btn-sm btn-primary">Edit</a>
                    {{-- <a href="{{ route('userDetail.delete', $userDetail) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                    <form action="{{ route('user-detail.destroy', $userDetail) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete"
                        onclick="return confirm('Are you sure ?');">
                    </form>
                </div>
            </div>
            <span class="text-gray-100">.</span>

                    @else
                        <p>You can create your user detail</p>
                        <a href="{{ route('user-detail.create') }}" class="btn btn-primary mt-3">create</a>

                    @endif

        <a href="{{ route('education.index') }}" class="btn btn-primary mt-3">Next<i class="fas fa-angle-double-right ml-5"></i></a>
    </div>

</x-app-layout>