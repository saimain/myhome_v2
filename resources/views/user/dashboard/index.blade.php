@extends('user.layouts.master')

@section('content')



<div class="container mt-3">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                    Cras justo odio
                </a>
                <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                <form id="logoutForm" action="{{ url('logout') }}" method="POST">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logoutForm').submit();"
                    class="list-group-item list-group-item-action"> <i class="fas fa-sign-out-alt"></i>
                    Logout</a>
            </div>
        </div>
    </div>
</div>

@endsection
