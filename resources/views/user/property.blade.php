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
            <hr>
            <small class="text-muted">Uploaded at {{ $property->created_at->diffForHumans() }}</small>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <span class="d-block"><i class="fas fa-map-marked text-primary"></i>
                                {{ $township->township_name }} |
                                {{ $region->region_name }}</span>
                            <span class="d-block mt-2" style="text-transform:capitalize"><i
                                    class="fas fa-building text-primary"></i>
                                {{ $property->type }}</span>
                            <span class="d-block mt-2"><i class="fas fa-bed text-primary"></i> {{ $property->bed_room }}
                                <i class="fas fa-bath text-primary ml-2"></i>
                                {{$property->bath_room}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <p style="line-height: 30px">
                    {{ $property->description }}
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="fb-share-button" data-href="{{ url('property/' . $property->id) }}" data-layout="button"
                        data-size="large"><a target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ url('property/' . $property->id) }}&amp;src=sdkpreparse"
                            class="fb-xfbml-parse-ignore">Share</a></div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
