<x-app-layout>
  {{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
      <span class="text-green-600">Dashboard</span>
      @if (auth()->user() && auth()->user()->role_id==2)
      <a href="{{ route('jobs.create') }}" class="btn btn-primary" style="float:right;">
          <i class="fas fa-plus mr-2"></i>Create a new job</a>
      @endif
  </h2>
</x-slot> --}}
<header class="bg-white shadow">
  <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
      <span class="text-green-600 font-semibold text-xl">Dashboard</span>
      @if (auth()->user() && auth()->user()->role_id==2)
      <a href="{{ route('jobs.create') }}" class="btn btn-primary" style="float:right;">
          <i class="fas fa-plus mr-2"></i>Create a new job</a>
      @endif

      @if (auth()->user() && auth()->user()->role_id==1)
      <a href="{{ route('user-detail.index', auth()->user()->id) }}" class="btn btn-primary" style="float:right;">
        <i class="fas fa-plus mr-2"></i>Make my CV</a>
      @endif

  </div>
</header>


  <section>
    <div class="container pt-3">
      {{-- <h1 class="text-3xl text-green-500">Tableau de bord</h1> --}}
      <div class="flex flex-col md:flex-row">

        @if (auth()->user()->role_id==1)

        <section class="text-gray-700 w-full w-1/3 mr-5">
          <h2 class="text-xl my-2"><svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
              <path fill="#fff"
                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg> Vos propositions ({{ auth()->user()->proposals->count() }})</h2>
          @foreach(auth()->user()->proposals as $proposal)
          <div class="mb-3 {{ $proposal->validated ? 'text-green-400' : '' }}">
            <span class="block  items-center">

              Pour la mission  <span class="font-semibold">"{{ $proposal->job->title }}"</span>
            </span>
            <span>Lettre de motivation :</span>
            <span class="badge rounded-pill bg-success deplier ml-2" style="font-size:11px; cursor:pointer" id="deplier">
              Voir <i class="fas fa-caret-down"></i></span>
              <article class="show-depli mt-3" id="show-depli" style="text-align: justify"
            >{{ $proposal->coverLetter->content }}</article>
          </div>
          @endforeach
        </section>



        <section class="text-sm text-gray-700 w-full w-1/3 mr-5">
          <h2 class="text-xl my-2"><svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg> Vos missions favorites ({{ auth()->user()->likes()->count() }})</h2>
          @foreach(auth()->user()->likes as $like)
          <div class="mb-3">
            <span class="block font-semibold">
              {{ $like->title }}
            </span>
          </div>
          @endforeach
        </section>

        @endif
      </div>

    </div>
  </section>



        @if (auth()->user()->role_id==2)

        <div class="container">
          <ul class="tabs">
            <li><a href="#tab1" class="btn btn-outline">
              <h6 class=" my-2">
              <svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
              </svg>
              All your missions ({{ auth()->user()->jobs()->count() }})
            </h6></a></li>
            <li><a href="#tab2" class="btn btn-outline">
              <h6 class=" my-2">
                <svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                All your proposals ({{ auth()->user()->proposals()->count() }})
              </h6>
            </a></li>

            {{-- <li><a href="#tab1"> onglet 1</a></li>
            <li><a href="#tab2"> onglet 2</a></li> --}}
          </ul>
        </div>


        <div class="container">
          <div class="row">
            <div id="tab1">

              <h2 class="text-xl my-2">
                <svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                All your missions ({{ auth()->user()->jobs()->count() }})
              </h2>
              <div class="col-12">
                <table class="table table-striped">
                  <thead>
                    <tr style= "font-weight: bold; color: white" class="bg-indigo-800">
                      <th scope="col">Title</th>
                      <th scope="col">Published on</th>
                      <th scope="col">Price</th>
                      <th scope="col">Status</th>
                      <th scope="col">Proposals</th>
                      <th scope="col">action</th>
                    </tr>
                  </thead>
                  <tbody style="font-weight: 500">

                    @foreach (auth()->user()->jobs as $job)
                      <tr>
                        <th>{{ $job->title }}</th>
                        <td>{{ $job->created_at->format('Y/m/d - H:m') }}</td>
                        <td>{{ number_format( $job->price, 2, ",", " " ) }}</td>
                        @if ($job->status==1)
                        <td>
                          <span class="badge rounded-pill bg-success ml-3" style="font-size:11px">Available</span>
                        </td>
                        @else
                        <td>
                          <span class="badge rounded-pill bg-danger ml-3" style="font-size:11px">Unavailable</span>
                        </td>
                        @endif
                        <td>({{ $job->proposals->count() }}
                          @choice('proposition|propositions', $job->proposals))
                        </td>
                        <td>
                          <a href="{{ route('jobs.edit', $job->id) }}" class="btn" style="color: green"><i
                            class="far fa-edit"></i></a> | |
                            <a href="{{ route('jobs.delete', $job->id) }}" class="btn" style="color: red"
                              onclick="return confirm('Are you sure ?');"><i class="fas fa-trash-alt"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <div id="tab2">

              <div class="col-8">
                <section class="text-sm text-gray-700 w-full">
                  <h2 class="text-xl my-2">
                    <svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    Proposals ({{ auth()->user()->proposals()->count() }})
                  </h2>
                  @foreach(auth()->user()->jobs as $job)
                  {{-- <div class="mb-3">
                    <span class="block font-semibold">
                      <a href="{{ route('jobs.edit', $job->id) }}" class="btn" style="color: green"><i
                          class="far fa-edit"></i></a> | |
                      <a href="{{ route('jobs.delete', $job->id) }}" class="btn" style="color: red"
                        onclick="return confirm('Are you sure ?');">
                        <i class="fas fa-trash-alt"></i></a> {{ $job->title }} ({{ $job->proposals->count() }}
                      @choice('proposition|propositions', $job->proposals)) :</span>
                    </span> --}}
                    <ul class="list-none ml-4">
                      @foreach($job->proposals as $proposal)
                      <li class="mt-2">• Envoyé par <strong>{{ $proposal->user->name }}</strong> pour le job
                        <strong>{{ $proposal->job->title }} </strong>
                        {{-- @if ($proposal->user->education->degree.count()>0)
                            {{ $proposal->user->education->degree }}
                        @endif --}}
                        <span class="badge rounded-pill bg-success deplier ml-2" style="font-size:11px; cursor:pointer" id="deplier">
                          Cover letter <i class="fas fa-caret-down"></i>
                        </span>
                          <article class="show-depli mt-3" id="show-depli" style="text-align: justify">
                            "{{ $proposal->coverLetter->content }}"
                          </article>

                      </li>
                      @if ($proposal->validated)
                      <span class="bg-white border border-green-500 text-xs p-1 my-2 inline-block text-green-500 rounded" id="deplier">
                        Déjà validé</span>

                        <a href= "{{ route('cancel.proposal', $proposal->id) }}"
                          class="bg-red-300 border border-green-500 text-xs p-1 my-2 mb-4 inline-block text-black rounded hover:bg-red-500 hover:text-white duration-500 transition">
                        Annuler la validation</a>
                      @else
                      <a href="{{ route('confirm.proposal', $proposal->id)}}"
                        class="bg-green-500 text-xs py-2 px-2 mt-2 mb-4 inline-block text-white hover:bg-green-300 hover:text-green-500 duration-200 transition rounded">Valider
                        la proposition</a>


                                    {{-- <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            preview of cv <i class="far fa-file-pdf ml-3" style="font-size: 20px"></i>
            </button>

    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ route('resume.index') }}" width="100%" height="900"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                    Close
                    </button>
                    <a href="{{ route('resume.download') }}" class="btn btn-primary">Download</a>
                </div>
                </div>
            </div>
            </div> --}}


                      @endif
                      {{-- <article class="show-depli mt-3" id="show-depli" style="text-align: justify">
                        "{{ $proposal->coverLetter->content }}"sjdklqsjdklsqkldlqksldqlsdlk
                      </article>
                      <p>qlsdjhqsjkdqsjkdqsjk</p> --}}

                      @endforeach
                    </ul>
                  {{-- </div> --}}

                  @endforeach
                </section>

              </div>

            </div>

          </div>
        </div>

        @endif


</x-app-layout>
