@extends('user.layouts.master')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <p><i class="fas fa-rss"></i> Blogs</p>
            <div class="row row-cols-1 row-cols-md-2">
                @foreach ($blogs as $blog)
                <div class="col mb-4">
                    <div class="card">
                        @if ($blog->image)
                        <img src="{{ asset('storage/blog/' . $blog->image) }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ url('blog/' . $blog->id) }}">{{ $blog->title }}</a></h5>
                            <div>
                                <small>{{ $blog->updated_at->diffForHumans() }}</small>
                            </div>
                            <div class="mt-3">
                                @php
                                echo nl2br(Str::limit($blog->body, 100));
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{ $blogs->links() }}

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
