@extends('dashboard.layouts.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Advertisements</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Advertisements</a></li>
                    <li class="breadcrumb-item active">View Advertisements</li>
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
                            <th>Start</th>
                            <th>End</th>
                            <th>Note</th>
                            <th>URL</th>
                            <th>Created at</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($advertises as $data)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $data->start }}</td>
                            <td>{{ $data->end }}</td>
                            <td>{{ $data->note }}</td>
                            <td>{{ $data->url }}</td>
                            <td>{{ date('d-m-Y',strtotime($data->updated_at)) }}</td>
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
                                    </div>
                                    <form id="deleteAdsForm{{ $data->id }}"
                                        action="{{ route('deleteAdvertise' , $data->id) }}" method="POST">
                                        @csrf
                                    </form>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="submit"
                                            form="deleteAdsForm{{ $data->id }}">Delete</button>
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
