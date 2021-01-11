@extends('dashboard.layouts.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Admin</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Account</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <p>
                    Create new admin
                </p>
                <form action="{{ route('admin.add') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="form-control mb-3">
                    <input type="text" name="email" placeholder="Email Address" class="form-control mb-3">
                    <input type="text" name="password" placeholder="Password" class="form-control mb-3">
                    <button class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered at</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($admins as $data)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->created_at->diffForHumans() }} </td>
                            <td>
                                <form action="{{ route('admin.delete' , $data->id) }}" id="deleteAdmin{{ $data->id }}"
                                    method="POST">
                                    @csrf
                                </form>
                                <button class="btn btn-sm btn-danger" type="submit"
                                    form="deleteAdmin{{ $data->id }}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<div class="row">

    <!-- end col -->
</div>

@endsection
