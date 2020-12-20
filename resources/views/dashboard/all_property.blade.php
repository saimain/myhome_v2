@extends('dashboard.layouts.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">All Properties</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Property</a></li>
                    <li class="breadcrumb-item active">All Properties</li>
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
                            <th>Title</th>
                            <th>Region & Township</th>
                            <th>Type</th>
                            <th>Area</th>
                            <th>Bed & Bath</th>
                            <th>Featured</th>
                            <th>Uploaded at</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($properties as $data)
                        @php
                        $region_name = DB::table('regions')->where('id',$data->region_id)->first();
                        $township_name = DB::table('townships')->where('id',$data->township_id)->first();
                        @endphp
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ Str::limit($data->title , 20) }}</td>
                            <td>{{ $region_name->region_name }} , {{ $township_name->township_name }}</td>
                            <td>{{ ucfirst($data->type) }}</td>
                            <td>{{ $data->area }}</td>
                            <td>{{ $data->bed_room }} | {{ $data->bath_room }}</td>
                            <td>
                                @if ($data->is_boosted == true)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-secondary">Normal</span>
                                @endif
                            </td>
                            <td>{{ $data->created_at->diffForHumans() }}
                                ({{ date('d-m-Y' , strtotime($data->created_at)) }}) </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#showModal{{ $data->id }}">View</button>
                            </td>
                        </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="showModal{{ $data->id }}" data-backdrop="static"
                            data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="card-title">{{ $data->title }}</p>
                                        <p>{{ $data->description }}</p>
                                        <div class="alert alert-success" role="alert">
                                            @if ($data->as_agent == true)
                                            <p>Uploaded as Agent Post</p>
                                            <hr>
                                            <dl class="row">
                                                <dt class="col-sm-3">ID</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->id }}
                                                </dd>
                                                <dt class="col-sm-3">Agent Name</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->agent_name }}
                                                </dd>
                                                <dt class="col-sm-3">Agent Type</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->agent_type }}
                                                </dd>
                                                <dt class="col-sm-3">Agent Phone</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->agent_phone }}
                                                </dd>
                                                <dt class="col-sm-3">Agent Address</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->agent_address }}
                                                </dd>
                                                <dt class="col-sm-3">Agent About</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->agent_about }}
                                                </dd>
                                                <dt class="col-sm-3">Registered</dt>
                                                <dd class="col-sm-9">
                                                    {{ date('d-m-Y',strtotime($data->user->created_at)) }}
                                                </dd>
                                                <dt class="col-sm-3">Account Points</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->point->points }} Points
                                                </dd>
                                            </dl>
                                            @else
                                            <dl class="row">
                                                <dt class="col-sm-3">ID</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->id }}
                                                </dd>
                                                <dt class="col-sm-3">Name</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->name }}
                                                </dd>
                                                @if ($data->user->email)
                                                <dt class="col-sm-3">Email</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->email }}
                                                </dd>
                                                @endif
                                                @if ($data->user->phone)
                                                <dt class="col-sm-3">Phone</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->phone }}
                                                </dd>
                                                @endif
                                                <dt class="col-sm-3">Registered</dt>
                                                <dd class="col-sm-9">
                                                    {{ date('d-m-Y',strtotime($data->user->created_at)) }}
                                                </dd>
                                                <dt class="col-sm-3">Account Points</dt>
                                                <dd class="col-sm-9">
                                                    {{ $data->user->point->points }} Points
                                                </dd>
                                            </dl>
                                            @endif
                                        </div>
                                        <div class="row">

                                            <div class="col-6">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Region</dt>
                                                    <dd class="col-sm-9">
                                                        {{ $region_name->region_name }}
                                                    </dd>
                                                    <dt class="col-sm-3">Township</dt>
                                                    <dd class="col-sm-9">
                                                        {{ $township_name->township_name }}
                                                    </dd>
                                                    <dt class="col-sm-3">For</dt>
                                                    <dd class="col-sm-9">{{ ucfirst($data->sale_rent) }}</dd>
                                                    <dt class="col-sm-3">Phone</dt>
                                                    <dd class="col-sm-9">{{ $data->phone }}</dd>
                                                    <dt class="col-sm-3">Type</dt>
                                                    <dd class="col-sm-9">{{ ucfirst($data->type) }}</dd>
                                                </dl>
                                            </div>
                                            <div class="col-6">
                                                <dl class="row">
                                                    <dt class="col-sm-3">Price</dt>
                                                    <dd class="col-sm-9">
                                                        {{ $data->price }} Lkhs
                                                    </dd>
                                                    <dt class="col-sm-3">Area</dt>
                                                    <dd class="col-sm-9">{{ $data->area }}</dd>
                                                    <dt class="col-sm-3">Bed </dt>
                                                    <dd class="col-sm-9">
                                                        {{ $data->bed_room }} Room
                                                    </dd>
                                                    <dt class="col-sm-3">Bath </dt>
                                                    <dd class="col-sm-9">
                                                        {{ $data->bath_room }} Room
                                                    </dd>
                                                    <dt class="col-sm-3">Featured</dt>
                                                    <dd class="col-sm-9">
                                                        @if ($data->is_boosted == true)
                                                        <span class="badge badge-success">Active
                                                        </span>
                                                        <b
                                                            class="text-success">{{ date('d-m-Y',strtotime($data->boost_exp_date)) }}</b>
                                                        @else
                                                        <span class="badge badge-secondary">Normal</span>
                                                        @endif
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#image{{ $data->id }}" aria-expanded="false"
                                            aria-controls="image{{ $data->id }}">
                                            View Images
                                        </button>
                                        <div class="collapse" id="image{{ $data->id }}">
                                            <div class="mt-3">
                                                <div class="row row-cols-1 row-cols-md-2">
                                                    @foreach (json_decode($data->images) as $image)
                                                    <div class="col mb-4">
                                                        <div class="card">
                                                            <img src="{{ asset('storage/property_image/' . $image) }}"
                                                                class="card-img-top" alt="...">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('propertyDeleteAdmin' , $data->id) }}" method="POST"
                                        id="deleteProperty{{ $data->id }}">
                                        @csrf
                                    </form>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="submit"
                                            form="deleteProperty{{ $data->id }}">Delete</button>
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
