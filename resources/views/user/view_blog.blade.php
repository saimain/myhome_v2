@extends('user.layouts.master')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h3>{{ $blog->title }}</h3>
            <small>{{ $blog->updated_at->diffForHumans() }}</small>
            <hr>
            @if ($blog->image)
            <img src="{{ asset('storage/blog/' . $blog->image) }}" class="card-img-top" alt="...">
            @endif
            <div class="mt-3">
                @php
                echo nl2br($blog->body);
                @endphp
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
