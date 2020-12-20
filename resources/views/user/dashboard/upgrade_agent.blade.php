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
            <p>Register Agent</p>
            <span class="card-description text-secondary">Please fills the form.</span>
            <form action="{{url('/my/account/agent')}}" method="POST" class="mt-3" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Agent Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="agent_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Agent Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="agent_type" id="">
                            <option selected disabled>Select agent type</option>
                            <option value="Property">Property Agent</option>
                            <option value="Individual">Individual Agent</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Agent Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="agent_phone">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Agent About</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="agent_about" id="" cols="30" rows="8"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Agent Address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="agent_address" id="" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Agent Profile</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="" name="agent_profile">
                            <label class="custom-file-label" for="">Choose Images</label>
                        </div>
                    </div>
                </div>
                <div id="image_preview"></div>
                <div class="form-group row">
                    <div class="col text-center mt-3">
                        <button type="submit" class="btn btn-primary text-white w-25">Upgrade Agent</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
