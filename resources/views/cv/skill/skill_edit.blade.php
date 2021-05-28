<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-green-600 font-semibold text-xl">CV Builder</p>
        </div>
    </header>

    <div class="container">
        <h2 class="mt-3">Edit work</h2>
        <form action="{{ route('skill.update', $skill) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-8 mx-36 offset-2 my-3">
                    <div class="form-group">
                        <label for="name" class="mb-1">Job title 
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="name"
                        value="{{ $skill->name }}" autocomplete="name" autofocus>
                        @error('name')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="col-8 mx-36 offset-2 mb-2">
                    <div class="form-group">
                        <label for="rating" class="mb-1">Rating/05
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="number" class="form-control" name="rating"
                        value="{{ $skill->rating }}" autocomplete="rating" autofocus>
                        @error('rating')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 mx-36 offset-2">Update skill</button>
        
        </form>
    </div>
    

</x-app-layout>