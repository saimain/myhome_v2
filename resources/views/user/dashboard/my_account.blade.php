@extends('user.layouts.master')

@section('content')




<div class="container mt-3">


    <div class="row">
        <div class="col-md-3">
            @include('user.dashboard.layouts.navbar')
        </div>

        <div class="col-md-9">
            <div>
                <p>User Account Informations</p>
                <form action="#">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}"
                                placeholder="@if(Auth::user()->email == null)Please fill your email @endif">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" value="{{ Auth::user()->phone }}">
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary text-white">Update</button>
                    </div>
                </form>
                <hr>
                <p>Change Password</p>
                <form action="#">
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input id="password" type="password" class="form-control" name="password" required
                                autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input id="password" type="password" class="form-control" name="password" required
                                autocomplete="new-password">
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary text-white">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
