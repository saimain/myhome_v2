@extends('user.layouts.master')

@section('content')



<div class="container mt-3">



    <div class="row">
        <div class="col-md-3">
            @include('user.dashboard.layouts.navbar')
        </div>

        <div class="col-md-9">
            @if ($packages->count() > 0)
            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($packages as $package)
                <div class="col mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/point_package/' . $package->image) }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $package->name }}</h5>
                            <p class="card-text">{{ $package->description }}</p>
                            <div class="d-flex justify-content-between">
                                <p class=" text-success"><i class="fas fa-coins"></i>
                                    {{ $package->point }}</p>
                                <p class=" text-success">
                                    {{ $package->price }} Ks
                                </p>
                            </div>
                            <div class="text-center">
                                <a href="{{ url('my/buy-point/package/' . $package->id) }}"
                                    class="btn btn-primary btn-sm text-white">Buy this Package</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p>Sorry , No point package available.</p>
            <p>If you need help , Call Now - <span class="text-primary"><u>0770204208</u></span></p>
            @endif
        </div>
    </div>

</div>

@endsection
