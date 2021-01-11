@extends('user.layouts.master')

@section('content')

@php
$regions = DB::table('regions')->get();
@endphp


@include('user.search')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            @isset($properties)
            @if ($properties->count() > 0)
            <p><i class="fas fa-building"></i> Search Results</p>
            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($properties as $property)
                @php
                $region = DB::table('regions')->where('id',$property->region_id)->first();
                $township = DB::table('townships')->where('region_id',$property->region_id)->first();
                @endphp
                <div class="col mb-4">
                    <div class="card h-100">
                        @php
                        $image = json_decode($property->images)[0];
                        @endphp
                        <img src="{{ asset('storage/property_image/' . $image) }}" class="card-img-top"
                            style="height: 200px" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ url('/property/' . $property->id) }}">
                                    {{ Str::limit($property->title, 50) }}
                                </a>
                            </h6>
                            <span><small>{{$township->township_name}} | {{$region->region_name}}</small></span>
                            <span class="text-primary d-block mb-2">{{$property->price}} Lakh (Kyats)</span>
                            <span class="mr-2"><i class="fas fa-bed"></i> {{$property->bed_room}}</span>
                            <span><i class="fas fa-bath"></i> {{$property->bath_room}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            @endisset

        </div>
        <div class="col-md-4">
            <div class="fb-page" data-href="https://web.facebook.com/myhomemyanmar1" data-tabs="" data-width=""
                data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                data-show-facepile="true">
                <blockquote cite="https://web.facebook.com/myhomemyanmar1" class="fb-xfbml-parse-ignore"><a
                        href="https://web.facebook.com/myhomemyanmar1">My Home Myanmar</a></blockquote>
            </div>
            <hr>
            <p>Advertisements</p>
            @include('user.advertises')
        </div>
    </div>


</div>
@endsection
