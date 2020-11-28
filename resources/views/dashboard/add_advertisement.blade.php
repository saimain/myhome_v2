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
                    <li class="breadcrumb-item active">Add New Advertisement</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-body">
        <form class="" action="{{ route('addNewAds') }}" method="POST" enctype="multipart/form-data" id="addNewAdsForm">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image">Image (.gif , .png , .jpg , .jpeg)</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" class="form-control" id="start_date">
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" class="form-control" id="end_date">
                    </div>
                    <div class="form-group">
                        <label for="url">URL (Optional)</label>
                        <input type="text" name="url" class="form-control" id="url">
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <input type="text" name="note" class="form-control" id="note">
                    </div>
                </div>
            </div>
        </form>
        <div class="text-right">
            <button type="submit" form="addNewAdsForm" class="btn btn-primary">Add New</button>
        </div>
    </div>
</div>

@endsection
