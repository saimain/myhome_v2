@extends('user.layouts.master')

@section('content')


<div class="container">
    <div class="row mt-3">
        <div class="col-md-8">
            <p><i class="fas fa-user-friends"></i> Agent Account</p>
            <div class="card border-0 mb-3 w-100" style="">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/agent_profile/' . $agent->agent_profile) }}" class="card-img"
                            alt="agent profile">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $agent->agent_name }}</h5>
                            <p class="text-dark card-text">{{ $agent->agent_about }}</p>
                            <p class="text-dark card-text">{{ $agent->agent_phone }}</p>
                            <p class="text-dark card-text">{{ $agent->agent_address }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                @php
                $properties =
                DB::table('properties')->where('user_id',$agent->id)->orderBy('created_at','DESC')->get();
                @endphp
                @foreach ($properties as $property)
                @php
                $region = DB::table('regions')->where('id',$property->region_id)->first();
                $township = DB::table('townships')->where('region_id',$property->region_id)->first();
                @endphp
                <div class="col mb-4">
                    <div class="card">
                        @php
                        $image = json_decode($property->images)[0];
                        @endphp
                        <img src="{{ asset('storage/property_image/' . $image) }}" class="card-img-top"
                            style="height: 200px" alt="...">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ url('/property/' . $property->id) }}">
                                    {{$property->title}}
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
