<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p class="text-green-600">Create a new job</p>
        </h2>
    </x-slot> --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
            <p class="text-indigo-600 font-semibold text-xl">Create a new job</p>
        </div>
    </header>


    <div class="container mt-3">
        <h2 class="text-gray-600" style="font-size:25px">Fill-in the form to create your new mission for the freelance
        </h2>
        <form action="{{ route('jobs.store', auth()->user()) }}" method="post">
            @csrf
            <div class="row hover:shadow-lg border border-gray-500 bg-white py-4"
                style="margin-top:4%; border-radius: 15px;">
                <div class="form-group col-md-6">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" @error('title') is-invalid @enderror
                        name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
                    @error('title')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                    <label for="">Description</label>
                    <textarea name="description" cols="30" rows="5" id="job-textarea" class="form-control"
                        @error('description') is-invalid @enderror name="description" value="{{ old('description') }}"
                        autocomplete="description" autofocus></textarea>
                    @error('description')
                        <span class="text-red-400 text-sm block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>

                </div>

                <div class="form-group col-md-6">
                    <label for="">Attachment</label>
                    <input type="file" class="form-control" name="attachment" @error('attachment') is-invalid @enderror
                        name="attachment" value="{{ old('attachment') }}" autocomplete="attachment" autofocus>
                    @error('attachment')
                        <span class="text-red-400 text-sm block" role="alert"></span>
                    @enderror
                    <br>

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
                                <span class="text-red-400 text-sm block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    {{-- <div class="form-group">
                        <div class="col-12">
                            <p>Questionnaire</p>
                            @foreach ([0,1,2] as $index)
                                <div class="d-flex">
                                    <input type="text" class="form-control mb-2"
                                        name="questionJobs[{{ $index }}] [question_title]"> <button
                                        class="ml-2 mb-2 btn btn-danger"><i class="fas fa-trash"></i></button>
                                </div>
                            @endforeach
                            <button class="btn btn-secondary mt-2"><i class="fas fa-plus"></i></button>
                        </div>
                    </div> --}}

                    {{-- Hour<input type="time"> --}}

                </div>
                <div class="form-group">
                    <x-jet-button class="px-5">Create<i class="fas fa-plus ml-3"></i></x-jet-button>
                </div>
            </div>
        </form>
    </div>

    @section('scripts')
        <script>
            ClassicEditor
                .create(document.querySelector('#job-textarea'))
                .catch(error => {
                    console.error(error);
                });

        </script>
    @endsection

</x-app-layout>
