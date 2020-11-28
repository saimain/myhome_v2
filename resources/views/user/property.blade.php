@extends('user.layouts.master')

@php
$first_image = json_decode($property->images)[0];
@endphp

@section('og-field')
<meta property="og:url" content="{{ url('property/' . $property->id) }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $property->title }}" />
<meta property="og:description" content="{{ $property->description }}" />
<meta property="og:image" content="{{ asset('storage/property_image/' . $first_image) }}" />
@endsection

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <h5>{{ $property->title }}</h5>
            <hr>
            <div id="lightgallery">
                @foreach (json_decode($property->images) as $image)
                <a href="{{ asset('storage/property_image/' . $image) }}" class="">
                    <img src="{{ asset('storage/property_image/' . $image) }}" class="card-img w-25 mb-1" />
                </a>
                @endforeach
            </div>

            <div class="mt-3">
                <p><i class="fas fa-map-marked text-primary"></i>
                    {{ $township->township_name }} |
                    {{ $region->region_name }}</p>
                <p>
                    <span class="d-block mt-3" style="text-transform:capitalize"><i
                            class="fas fa-building text-primary"></i>
                        {{ $property->type }}</span>
                </p>
                <p>
                    <span class="" style="text-transform:capitalize"><i class="fas fa-chart-area text-primary"></i>
                        {{ $property->area }}</span>
                </p>
                <p>
                    <span class="d-block mt-3"><i class="fas fa-bed text-primary"></i>
                        {{ $property->bed_room }}
                        <i class="fas fa-bath text-primary ml-2"></i>
                        {{$property->bath_room}}</span>
                </p>
                <p>Price (Kyats)</p>
                <h5 class="text-primary">{{ $property->price }} Lkhs</h5>
            </div>
            <div class="mt-3">
                <p style="line-height: 30px">
                    {{ $property->description }}
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-flex align-items-center">
                <div class="flex-fill">
                    <a target="_blank"
                        href="https://www.facebook.com/sharer/sharer.php?u={{ url('property/' . $property->id) }}&amp;src=sdkpreparse"
                        class="btn text-white" style="background: #4267B2;"><i class="fab fa-facebook-f"></i>
                        Share
                        on
                        Facebook
                    </a>
                </div>
                <div class="flex-fill">
                    <a href=" #" class="btn text-white btn-primary w-100"><i class="far fa-save"></i>
                        Save to Account
                    </a>
                </div>
            </div>
            <div class="card mt-3 ">
                <div class="card-body">
                    <small class="text-muted">{{ $property->created_at->diffForHumans() }}
                        ( {{ date('d-m-Y' , strtotime($property->created_at)) }} )</small>
                    <br>
                    <span class="">
                        <a href="#">
                            {{ $property->user->name }}
                        </a>
                        <br>
                        <span>
                            {{ $property->user->email }}
                        </span>
                        <br>
                        <span>
                            {{ $property->user->phone }}
                        </span>
                    </span>
                    <div class="mt-3 d-flex">
                        <a href="#" class="flex-fill mr-2 btn btn-primary text-white">Call Phone</a>
                        <a href="#" class="flex-fill btn btn-primary text-white">Send Message</a>
                    </div>
                </div>
            </div>
            <hr>
            <p>Advertisements</p>
            @include('user.advertises')
        </div>
    </div>
</div>



@endsection
