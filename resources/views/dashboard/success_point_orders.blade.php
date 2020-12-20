@extends('dashboard.layouts.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Success Point Orders</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Points</a></li>
                    <li class="breadcrumb-item active">Success Point Orders</li>
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
                            <th>Order No.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Package</th>
                            <th>Points</th>
                            <th>Price</th>
                            <th>Order at</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->package->name }}</td>
                            <td>{{ $order->package->point }} Points</td>
                            <td>{{ $order->package->price }} Ks</td>
                            <td>{{ $order->created_at->diffForHumans() }} </td>
                            <td>
                                @if ($order->is_success)
                                <span class="text-success">Success</span>
                                @else
                                <span class="text-primary">Pending</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#orderModal{{ $order->id }}">View</button>
                            </td>
                        </tr>

                        <div class="modal fade" id="orderModal{{ $order->id }}" data-keyboard="false" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Order Detail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Order Number : {{ $order->order_number }}
                                            @if ($order->is_success)
                                            <span class="badge badge-success">Success</span>
                                            @else
                                            <span class="badge badge-primary">Pending</span>
                                            @endif
                                        </p>

                                        <p>Name : {{ $order->user->name }}</p>
                                        <p>Contact Phone : {{ $order->phone }}</p>
                                        <p>Point : {{ $order->package->point }}</p>
                                        <p>Price : {{ $order->package->price }} Ks</p>
                                        <p>Ordered at : {{ $order->created_at->diffForHumans() }}</p>
                                        @if ($order->is_success)
                                        <div class="alert alert-success" role="alert">
                                            Order Points have been transfered
                                            <b>{{ $order->updated_at->diffForHumans() }}</b>.
                                        </div>
                                        @endif
                                        <hr>
                                        <p>Payment Screenshot</p>
                                        <img src="{{ asset('storage/point_order/'. $order->image) }}" class="card-img"
                                            alt="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        @if (!$order->is_success)
                                        <form id="deleteOrder{{ $order->id }}"
                                            action="{{ url('dashboard/point-order/cencel/' . $order->id) }}"
                                            method="POST">
                                            @csrf
                                        </form>
                                        <button type="submit" form="deleteOrder{{ $order->id }}" class="btn btn-danger">
                                            Cancel Order
                                        </button>
                                        <button type="submit" form="transferOrderForm{{ $order->id }}"
                                            class="btn btn-primary">Transfer Order</button>
                                        @endif
                                    </div>
                                    <form action="{{ url('dashboard/point-order/transfer') }}"
                                        id="transferOrderForm{{ $order->id }}" method="POST">
                                        @csrf
                                        <input type="text" hidden value="{{ $order->id }}" name="order_id">
                                        <input type="text" hidden value="{{ $order->user->id }}" name="user_id">
                                    </form>
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
