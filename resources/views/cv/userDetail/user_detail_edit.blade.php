<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-green-600 font-semibold text-xl">CV Builder</p>
        </div>
    </header>

    <div class="container">
        <h2 class="mt-3">Edit work</h2>
        <form action="{{ route('user-detail.update', $userDetail) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-8 mx-36 offset-2 my-3">
                    <div class="form-group">
                        <label for="fullname" class="mb-1">Fullname 
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="fullname"
                        value="{{ $userDetail->fullname }}" autocomplete="fullname" autofocus>
                        @error('fullname')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="col-8 mx-36 offset-2 mb-2">
                    <div class="form-group">
                        <label for="email" class="mb-1">Email
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="email"
                        value="{{ $userDetail->email }}" autocomplete="email" autofocus>
                        @error('email')
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
                        <label for="address" class="mb-1">Address
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="address"
                        value="{{ $userDetail->address }}" autocomplete="address" autofocus>
                        @error('address')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="col-8 mx-36 offset-2 mb-2">
                    <div class="form-group">
                        <label for="phone" class="mb-1">Phone
                            <strong style="color:red; ">*</strong>
                        </label>
                        <input type="text" class="form-control" name="phone"
                        value="{{ $userDetail->phone }}" autocomplete="phone" autofocus>
                        @error('phone')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
                <div class="col-8 mx-36 offset-2 mb-2">
                    <div class="form-group">
                        <label for="summary" class="mb-1">Summary
                            <strong style="color:red; ">*</strong>
                        </label>
                        <textarea name="summary"  autocomplete="summary" cols="30" rows="4" class="form-control">{{ $userDetail->summary }}</textarea>
                        @error('summary')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>    
                </div>
    
            </div>

            <button type="submit" class="btn btn-primary mt-3 mx-36 offset-2">Update</button>
        
        </form>
    </div>
    

</x-app-layout>