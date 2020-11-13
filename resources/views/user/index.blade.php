@extends('user.layouts.master')

@section('content')

{{-- Search Div --}}
<div class="search_div py-5 mb-3">
    <div class="container">
        <p class="text-center text-white">သင့်ရဲ့စိတ်တိုင်းကျအိမ်ခြံမြေကိုရှာဖွေလိုက်ပါ</p>
        <form action="#">
            @csrf
            <input type="text" placeholder="Title" class="form-control mt-1 mr-md-2">
            <div class="d-block d-md-flex ">
                <select class="custom-select mt-1 mr-md-2">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="custom-select mt-1  mr-md-2">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="custom-select mt-1">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="d-block d-md-flex">
                <select class="custom-select mt-1 mr-md-2">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="custom-select mt-1 mr-md-2">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="custom-select mt-1">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mt-1">
                <button class="btn btn-primary text-center w-100 text-white mt-1">Search</button>
            </div>
        </form>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <p><i class="fas fa-building"></i> Featured Properties For Sale</p>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/450x250" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/450x250" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/450x250" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/450x250" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/450x250" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <p>Advertisements</p>
            <div class="row">
                <div class="col">
                    <img src="https://via.placeholder.com/450x200" class="card-img-top mb-1" alt="...">
                    <img src="https://via.placeholder.com/450x200" class="card-img-top mb-1" alt="...">
                    <img src="https://via.placeholder.com/450x200" class="card-img-top mb-1" alt="...">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
