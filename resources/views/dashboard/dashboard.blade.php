@extends('dashboard.layouts.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Welcome to Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5>Import / Export</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="border px-3 py-2 mt-3">
                            <p>Users Import</p>
                            @if (session('users.import.success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('users.import.success') }}
                            </div>
                            @endif
                            @if (session('users.import.error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('users.import.error') }}
                            </div>
                            @endif

                            <form action="{{ route('import.users') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <input type="file" name="users_file">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border px-3 py-2 mt-3">
                            <p>Users Point Import</p>
                            @if (session('users.point.import.success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('users.point.import.success') }}
                            </div>
                            @endif
                            @if (session('users.point.import.error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('users.point.import.error') }}
                            </div>
                            @endif

                            <form action="{{ route('import.users.point') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <input type="file" name="users_point_file">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border px-3 py-2 mt-3">
                            <p>Properties Import</p>
                            @if (session('users.properties.import.success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('users.properties.import.success') }}
                            </div>
                            @endif
                            @if (session('users.properties.import.error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('users.properties.import.error') }}
                            </div>
                            @endif

                            <form action="{{ route('import.users.properties') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <input type="file" name="users_properties_file">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5>Data Analysis</h5>
                <div class="row">
                    <div class="col-md-3">
                        <div class="border shadow px-3 py-2 mt-3">
                            <p>Properties</p>
                            <h2 class="d-inline">{{ \App\Models\Property::count() }}</h2> Posts
                            <div class="card-footer mt-3">
                                Last Posted at {{  \App\Models\Property::all()->last()->created_at->diffForHumans() }}.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border shadow px-3 py-2 mt-3">
                            <p>Users</p>
                            <h2 class="d-inline">{{ \App\Models\User::where('is_agent',false)->count() }}</h2> Accounts
                            <div class="card-footer mt-3">
                                Last Posted at
                                {{  \App\Models\User::where('is_agent',false)->get()->last()->created_at->diffForHumans() }}.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border shadow px-3 py-2 mt-3">
                            <p>Agents</p>
                            <h2 class="d-inline">{{ \App\Models\User::where('is_agent',true)->count() }}</h2> Accounts
                            <div class="card-footer mt-3">
                                Last Posted at
                                {{  \App\Models\User::where('is_agent',true)->get()->last()->created_at->diffForHumans() }}.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border shadow px-3 py-2 mt-3">
                            <p>Pending Point Orders</p>
                            <h2 class="d-inline text-danger">
                                {{ \App\Models\PointOrder::where('is_success',false)->count() }}</h2>
                            Orders
                            <div class="card-footer mt-3">
                                @if (\App\Models\PointOrder::where('is_success',false)->count() > 0)
                                Last Posted at
                                {{  \App\Models\PointOrder::where('is_success',false)->get()->last()->created_at->diffForHumans() }}.
                                @else
                                No Orders Yet.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
