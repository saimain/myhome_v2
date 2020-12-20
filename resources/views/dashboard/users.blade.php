@extends('dashboard.layouts.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Users</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">User & Agent</a></li>
                    <li class="breadcrumb-item active">Users</li>
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
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Points</th>
                            <th>Registered at</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $data)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>
                                <b class="text-success"> {{ $data->point->points }}</b> Points
                            </td>
                            <td>{{ $data->created_at->diffForHumans() }} </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#viewModal{{ $data->id }}">View</button>
                            </td>
                        </tr>

                        <div class="modal fade" id="viewModal{{ $data->id }}" data-keyboard="false" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Name : {{ $data->name }}</p>
                                        <p>Contact Phone : {{ $data->phone }}</p>
                                        <p>Point : {{ $data->point->points }} Points <small>( Last Updated :
                                                {{ $data->point->updated_at->diffForHumans() }} )</small></p>
                                        <p>Registered at : {{ $data->created_at->diffForHumans() }}</p>
                                        <hr>
                                        <p><b>Total Upload Properties ( {{ $data->properties->count() }} )</b></p>
                                        @if ($data->properties->count() > 0)
                                        <div class="list-group  list-group-flush">
                                            @foreach ($data->properties as $property)
                                            <a href="{{ url('property/' . $property->id) }}" target="_blank"
                                                class="list-group-item list-group-item-action">{{ $property->title }}</a>
                                            @endforeach
                                        </div>
                                        @else
                                        No Property
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>

@endsection
