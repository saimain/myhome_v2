@extends('dashboard.layouts.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Edit Package</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Points</a></li>
                    <li class="breadcrumb-item active">Edit Package</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-body">
        <form class="" action="{{ route('updatePointPackage' , $package->id) }}" method="POST"
            enctype="multipart/form-data" id="updatePointPackage">
            @csrf
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="name">Package Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $package->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descritpion (Optional)</label>
                        <input type="text" name="description" class="form-control" id="description"
                            value="{{ $package->description }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Package Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="point">Points</label>
                        <input type="number" name="point" class="form-control" id="point" value="{{ $package->point }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price (Ks)</label>
                        <input type="number" name="price" class="form-control" id="price" value="{{ $package->price }}">
                    </div>
                </div>
            </div>
        </form>
        <div class="text-right">
            <button type="submit" form="updatePointPackage" class="btn btn-primary">Update Package</button>
        </div>
    </div>
</div>

@endsection
