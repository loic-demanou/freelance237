<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-green-600 font-semibold text-xl">CV Builder</p>
        </div>
    </header>

    <div class="container">
        <h2 class="mt-3">Edit education</h2>
        <form action="{{ route('education.update', $education) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-8 mx-36 offset-2 my-3">
                    <div class="form-group">
                        <label for="school_name" class="mb-1">School name 
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="school_name"
                        value="{{ $education->school_name }}" autocomplete="school_name" autofocus>
                        @error('school_name')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="col-8 mx-36 offset-2 mb-2">
                    <div class="form-group">
                        <label for="school_location" class="mb-1">School location
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="school_location"
                        value="{{ $education->school_location }}" autocomplete="school_location" autofocus>
                        @error('school_location')
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
                        <label for="degree" class="mb-1">Degree
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="degree"
                        value="{{ $education->degree}}" autocomplete="degree" autofocus>
                        @error('degree')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="col-8 mx-36 offset-2 mb-2">
                    <div class="form-group">
                        <label for="field_of_study" class="mb-1">Field of study
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="field_of_study"
                        value="{{ $education->field_of_study }}" autocomplete="field_of_study" autofocus>
                        @error('field_of_study')
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
                        <label for="graduation_start_date" class="mb-1">Graduation start date
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="date" class="form-control" name="graduation_start_date"
                        value="{{ $education->graduation_start_date }}" autocomplete="graduation_start_date" autofocus>
                        @error('graduation_start_date')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="col-4 ">
                    <div class="form-group">
                        <label for="graduation_end_date" class="mb-1">Graduation end date
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="date" class="form-control" name="graduation_end_date"
                        value="{{ $education->graduation_end_date}}" autocomplete="graduation_end_date" autofocus>
                        @error('graduation_end_date')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 mx-36 offset-2">Update Education</button>
        
        </form>
    </div>
    

</x-app-layout>