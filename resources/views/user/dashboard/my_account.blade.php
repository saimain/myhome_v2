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
            @if (Auth::user()->is_agent == false)
            <div class="alert alert-success">
                You can upgrade your account to agent.<a href="{{ url('/my/account/agent') }}"> <u>Click here</u></a>
            </div>
            @endif
            <div>
                <p>User Account Informations</p>
                <form action="#">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ Auth::user()->name }}">
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
                <p>Agent Informations</p>
                <form action="#">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="agent_name" id="name"
                                value="{{ Auth::user()->agent_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="agent_type" id="">
                                <option value="Property">Property Agent</option>
                                <option value="Individuat">Individual Agent</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="agent_phone"
                                value="{{ Auth::user()->agent_phone }}" name="agent_phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">About</label>
                        <div class="col-sm-10">
                            <textarea name="agent_address" class="form-control" id="" cols="30"
                                rows="8">{{ Auth::user()->agent_about }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea name="agent_address" class="form-control" id="" cols="30"
                                rows="5">{{ Auth::user()->agent_phone }}</textarea>
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
