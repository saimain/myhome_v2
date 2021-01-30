@extends('dashboard.layouts.master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Blog</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                    <li class="breadcrumb-item active">View Blog</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3">
                    @foreach ($blogs as $blog)
                    <div class="col mb-4">
                        <div class="card">
                            @if ($blog->image)
                            <img src="{{ asset('storage/blog/' . $blog->image) }}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <div>
                                    <small>{{ $blog->updated_at->diffForHumans() }}</small>
                                </div>
                                <div class="mt-3">
                                    @php
                                    echo nl2br($blog->body);
                                    @endphp
                                </div>
                                <div class="mt-3 text-right">
                                    <a href="{{ route('dashboard.blog.edit' , $blog->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('dashboard.blog.destroy' , $blog->id) }}"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
