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
                    <li class="breadcrumb-item active">Edit Blog</li>
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
                <p>Edit blog</p>
                <form class="" action="{{ route('dashboard.blog.update' , $blog->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            @if ($blog->image)
                            <img src="{{ asset('storage/blog/' . $blog->image) }}" class="card-img-top w-100" alt="...">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Article Image (.gif , .png , .jpg , .jpeg)</label>
                                <input type="file" name="image" class="form-control-file" id="image">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ $blog->title }}">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="body" id="body" cols="30"
                                    rows="20">{{ $blog->body }}</textarea>
                            </div>

                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
