<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-green-600 font-semibold text-xl">CV Builder</p>
        </div>
    </header>

    <div class="container">
        <h2 class="mt-3">Edit work</h2>
        <form action="{{ route('experience.update', $experience) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-8 mx-36 offset-2 my-3">
                    <div class="form-group">
                        <label for="job_title" class="mb-1">Job title 
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="job_title"
                        value="{{ $experience->job_title }}" autocomplete="job_title" autofocus>
                        @error('job_title')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="col-8 mx-36 offset-2 mb-2">
                    <div class="form-group">
                        <label for="employer" class="mb-1">Employer
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="employer"
                        value="{{ $experience->employer }}" autocomplete="employer" autofocus>
                        @error('employer')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>    
                </div>
            </div>
            <div class="row">
                <div class="col-8 mx-36 offset-2 mb-2">
                    <div class="form-group">
                        <label for="city" class="mb-1">City
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="city"
                        value="{{ $experience->city }}" autocomplete="city" autofocus>
                        @error('city')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="col-8 mx-36 offset-2 mb-2">
                    <div class="form-group">
                        <label for="state" class="mb-1">State
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="state"
                        value="{{ $experience->state }}" autocomplete="state" autofocus>
                        @error('state')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
            </div>

            <div class="row mx-36 offset-2 mb-2" >
                <div class="col-4">
                    <div class="form-group">
                        <label for="start_date" class="mb-1">Start date
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="date" class="form-control" name="start_date"
                        value="{{ $experience->start_date }}" autocomplete="start_date" autofocus>
                        @error('start_date')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="col-4 ">
                    <div class="form-group">
                        <label for="end_date" class="mb-1">End date
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="date" class="form-control" name="end_date"
                        value="{{ $experience->end_date }}" autocomplete="end_date" autofocus>
                        @error('end_date')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
            </div>
            <div class="col-8 mx-36 offset-2 mb-2">
                <div class="form-group">
                    <label for="description" class="mb-1">Description</label>
                    <textarea name="description"  autocomplete="description" cols="30" rows="4" class="form-control">{{ $experience->description }}</textarea>
                    @error('description')
                    <span class="text-red-400 text-sm block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>    
            </div>
        </div>

            <button type="submit" class="btn btn-primary mt-3 mx-36 offset-2">Update Experience</button>
        
        </form>
    </div>
    

</x-app-layout>