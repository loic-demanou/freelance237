<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p class="text-green-600">Create a new job</p>
        </h2>
    </x-slot>

    <div class="container mt-3">
        <form action="{{ route('jobs.store' ,auth()->user() )}}" method="post">
            @csrf
            <div class="row">
                <div class="form-group">
                    <div class="col-md-6">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" @error('title') is-invalid @enderror
                            name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                        @error('title')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><br>

                    <div class="col-md-6">
                        <label for="">Description</label>
                        <textarea name="description" cols="30" rows="10" class="form-control" @error('description')
                            is-invalid @enderror name="description" value="{{ old('description') }}"
                            autocomplete="description" autofocus></textarea>
                        @error('description')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="">Attachment</label>
                        <input type="file" class="form-control" name="attachment" @error('attachment') is-invalid
                            @enderror name="attachment" value="{{ old('attachment') }}" autocomplete="attachment"
                            autofocus>
                        @error('attachment')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><br>

                    <div class="col-md-3">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price" @error('price') is-invalid @enderror
                            name="price" value="{{ old('price') }}" autocomplete="price" autofocus>
                        @error('price')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="mt-4 col-6">
                        <p for="role-select" class="font-semibold text-gray-700 mb-2">Status</p>
                        <div class="flex justify-between items-center pb-4">
                            <label for="available">Available
                                <input type="radio" value="1" id="available" name="status">
                                <span class="checkmark"></span>
                            </label>
                            <label for="client">Unavailable
                                <input type="radio" value="2" id="client" name="status">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        @error('status')
                        <span class="text-red-400 text-sm block">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>