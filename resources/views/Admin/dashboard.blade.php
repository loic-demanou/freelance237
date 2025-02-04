@extends('Admin.layouts.master')

@section('content')

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid px-lg-4">
                    <div class="row">
                        <div class="col-md-12 mt-lg-4 mt-4">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                        class="fas fa-download fa-sm text-white-50"></i>
                                    Generate Report</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Users</h5>
                                            <h1 class="display-5 mt-1 mb-3">{{ $users->count() }} </h1>
                                            <div class="mb-1">
                                                <span class="text-danger"> <i
                                                        class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Jobs</h5>
                                            <h1 class="display-5 mt-1 mb-3">{{ $jobs->count() }}</h1>
                                            <div class="mb-1">
                                                <span class="text-danger"> <i
                                                        class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Proposals</h5>
                                            <h1 class="display-5 mt-1 mb-3">{{ $proposals->count() }}</h1>
                                            <div class="mb-1">
                                                <span class="text-danger"> <i
                                                        class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Visitors</h5>
                                            <h1 class="display-5 mt-1 mb-3">1</h1>
                                            <div class="mb-1">
                                                <span class="text-success"> <i
                                                        class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                                <span class="text-muted">Since last week</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>



                        <!-- column -->
                        <div class="col-md-12 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <!-- title -->
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">Top Selling Products</h4>
                                            <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="dl">
                                                <select class="custom-select">
                                                    <option value="0" selected="">Monthly</option>
                                                    <option value="1">Daily</option>
                                                    <option value="2">Weekly</option>
                                                    <option value="3">Yearly</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- title -->
                                </div>
                                <div class="table-responsive">
                                    <table class="table v-middle">
                                        <thead>
                                            <tr class="bg-light">
                                                <th class="border-top-0">Photo</th>
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0">Email</th>
                                                <th class="border-top-0">Role</th>
                                                <th class="border-top-0">Member since</th>
                                                <th class="border-top-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            {{-- <div class="m-r-10"><a
                                                                class="btn btn-circle btn-info text-white">EA</a>
                                                        </div> --}}
                                                            <div class="">
                                                                <h6 class="m-b-0">
                                                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                                        <img class="h-8 w-8 rounded-circle object-cover border-1"
                                                                            src="{{ $user->profile_photo_url }}"
                                                                            alt="{{ $user->name }}" />

                                                                    @else
                                                                        <div>{{ $user->name }}</div>

                                                                        <div class="ml-1">
                                                                            <svg class="fill-current h-2 w-2"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 20 20">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>
                                                                        </div>

                                                                    @endif

                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <label
                                                        @if ($user->role_id == 1)
                                                        <span class="badge rounded-pill bg-success ml-3 text-white" style="font-size:13px">Candidate</span>
                                                        @elseif ($user->role_id == 2 )
                                                        <span class="badge rounded-pill bg-success ml-3 text-white" style="font-size:13px">University</span>

                                                        @endif
                                                        </label>
                                                    </td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary"><i
                                                                class="fas fa-plus"></i></a>
                                                        <a href="#" class="btn btn-warning"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="#" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->


    
@endsection