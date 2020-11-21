@extends('user.layouts.master')

@section('content')



<div class="container mt-3">

    {{ Breadcrumbs::render('upload-property') }}

    <div class="row">
        <div class="col-md-3">
            @include('user.dashboard.layouts.navbar')
        </div>

        <div class="col-md-9">
            <p>Upload Property</p>
            <span class="card-description text-secondary">Fills the form and upload your property for free.</span>
            <form action="{{url('/my/upload-property')}}" method="POST" class="mt-3" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-5">
                        <select class="custom-select" id="region_select" name="region_id">
                            <option selected>Region</option>
                            @foreach ($regions as $region)
                            <option value="{{$region->id}}">{{$region->region_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <select class="custom-select" id="township_select" name="township_id">
                            <option selected>Township</option>
                            <option value="">Please select Region first.</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="type">
                            <option selected value="apartment">Apartment</option>
                            <option value="condo">Condo</option>
                            <option value="private house">Private House</option>
                            <option value="shop">Shop</option>
                            <option value="office">Office</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Area</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="area">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Bed Room</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="" name="bed_room">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Bath Room</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="" name="bath_room">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="" rows="3" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Contact Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="phone">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Sale / Rent </label>
                    <div class="col-sm-10">
                        <select class="custom-select" name="sale_rent">
                            <option value="sale">For Sale</option>
                            <option value="rent">For Rent</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Price (Lkhs)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="" name="price">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Images</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="uploadImages" name="images[]" multiple>
                            <label class="custom-file-label" for="">Choose Images</label>
                        </div>
                    </div>
                </div>
                <div id="image_preview"></div>
                <div class="form-group row">
                    <div class="col text-center mt-3">
                        <button type="submit" class="btn btn-primary text-white w-25">Upload Property</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
