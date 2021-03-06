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
            @if ($saved_properties->count() > 0)
            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($saved_properties as $saved_property)
                @php
                $property = \App\Models\Property::find($saved_property->property_id);
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
            @else
            <p>
                No saved property.
            </p>
            @endif
        </div>
    </div>

</div>

@endsection
