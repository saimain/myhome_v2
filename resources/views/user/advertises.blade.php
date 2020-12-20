@php
$advertises = DB::table('advertises')->get();
@endphp

<div class="row">
    <div class="col">
        @foreach ($advertises as $ads)
        <div>
            <a href="{{ $ads->url }}">
                <img src="{{ asset('storage/advertise/' . $ads->image) }}" class="card-img-top mb-1"
                    alt="{{ asset('storage/advertise/' . $ads->image) }}">
            </a>
        </div>
        @endforeach
    </div>
</div>
