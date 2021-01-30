@extends('user.layouts.master')

@section('content')



<div class="container mt-3">


    <div class="row">
        <div class="col-md-3">
            <div class="d-none d-md-block">
                @include('user.dashboard.layouts.navbar')
            </div>
        </div>

        <div class="col-md-9">
            <p>
                @isset($property)
                Edit Property
                @else
                Upload Property
                @endisset
            </p>
            @if($errors->any())
            <div class="alert alert-danger">
                Upload Property Failed. Please check your fills.
            </div>
            @endif
            @if (Session::get('success'))
            <div class="alert alert-success">
                {{  Session::get('success') }}
            </div>
            @endif
            @isset($property)
            <form action="{{url('/my/update/property/' . $property->id)}}" method="POST" class="mt-3"
                enctype="multipart/form-data">
                @csrf
                @else
                <form action="{{url('/my/upload-property')}}" method="POST" class="mt-3" enctype="multipart/form-data">
                    @endisset
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="" name="title" @isset($property)
                                value="{{ $property->title }}" @endisset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-5">

                            <select class="custom-select" id="region_select" name="region_id">
                                @isset($property)
                                @php
                                $region = DB::table('regions')->where('id',$property->region_id)->first();
                                $township = DB::table('townships')->where('id',$property->township_id)->first();
                                @endphp
                                <option selected value="{{ $property->region_id }}">{{ $region->region_name }}</option>
                                @else
                                <option selected>Region</option>
                                @endisset
                                @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{$region->region_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <select class="custom-select" id="township_select" name="township_id">
                                @isset($property)
                                <option selected value="{{ $property->township_id }}">{{ $township->township_name }}
                                </option>
                                @else
                                <option selected>Township</option>
                                <option value="">Please select Region first.</option>
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="type">
                                @isset($property)
                                <option selected value="{{ $property->type }}">
                                    {{ Str::ucfirst($property->type) }}
                                </option>
                                @endisset
                                <option value="apartment">Apartment</option>
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
                            <input type="text" class="form-control" id="" name="area" @isset($property)
                                value="{{ $property->area }}" @endisset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Bed Room</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="" name="bed_room" @isset($property)
                                value="{{ $property->bed_room }}" @endisset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Bath Room</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="" name="bath_room" @isset($property)
                                value="{{ $property->bath_room }}" @endisset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="" rows="10"
                                name="description">@isset($property){{ $property->description }}@endisset</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Contact Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="" name="phone" @isset($property)
                                value="{{ $property->phone }}" @endisset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Sale / Rent </label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="sale_rent">
                                @isset($property)
                                <option value="{{ $property->sale_rent }}" selected>For
                                    {{ Str::ucfirst($property->sale_rent) }}</option>
                                @endisset
                                <option value="sale">For Sale</option>
                                <option value="rent">For Rent</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Price (Lkhs)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="" name="price" @isset($property)
                                value="{{ $property->price }}" @endisset>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Images</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="uploadImages" name="images[]" multiple
                                    @isset($property) value="{{ $property->images }}" @endisset>
                                <label class="custom-file-label" for="">Choose Images</label>
                            </div>
                        </div>
                    </div>
                    <div id="image_preview"></div>
                    <div class="form-group row">
                        <div class="col text-center mt-3">
                            <button type="submit" class="btn btn-primary text-white w-25">@isset($property)
                                Save Property
                                @else
                                Upload Property
                                @endisset</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>

</div>

@endsection
