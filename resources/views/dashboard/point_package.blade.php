@extends('dashboard.layouts.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Point Packages</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Points</a></li>
                    <li class="breadcrumb-item active">Point Packages</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row row-cols-1 row-cols-md-5">
    @foreach ($packages as $package)
    <div class="col mb-4">
        <div class="card">
            <img src="{{ asset('storage/point_package/' . $package->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $package->name }}</h5>
                <p class="card-text">
                    {{ $package->description }}
                </p>
                <p>
                    <small>{{ $package->created_at->diffForHumans() }}</small>
                </p>
                <div class="d-flex justify-content-between">
                    <p class="card-text text-success"><i class="fas fa-coins"></i> {{ $package->point }}</p>
                    <p class="card-text text-success">{{ $package->price }} Ks</p>
                </div>
                <div>
                    <a href="{{ url('dashboard/point-package/edit/' . $package->id) }}"
                        class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                    <button type="submit" form="deletePackageForm{{ $package->id }}" class="btn btn-sm btn-danger"><i
                            class="fas fa-times"></i> Delete</button>
                </div>
                <form id="deletePackageForm{{ $package->id }}" action="{{ route('deletePointPackage' , $package->id) }}"
                    method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    @endforeach
</div>

@endsection
