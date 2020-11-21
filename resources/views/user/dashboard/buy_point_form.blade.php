@extends('user.layouts.master')

@section('content')



<div class="container mt-3">

    {{ Breadcrumbs::render('point-package' , $package) }}


    <div class="row">
        <div class="col-md-3">
            @include('user.dashboard.layouts.navbar')
        </div>

        <div class="col-md-9 mt-3 mt-md-0">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/point_package/' . $package->image) }}" class="card-img" alt="">
                </div>
                <div class="col-md-6 mt-2 mt-md-0">
                    <p>{{ $package->name }}</p>
                    <p>{{ $package->description }}</p>
                    <div>
                        <p class="text-success"><i class="fas fa-coins"></i> Points - {{ $package->point }}</p>
                        <p class="text-success"><i class="fas fa-tag"></i> Price - {{ $package->price }} Ks</p>
                    </div>

                </div>
            </div>
            <div class="mt-5">
                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif
                <div class="card card-body text-center border-primary">
                    <p>ငွေလွဲထားသော Screenshot ထည့်ပါ</p>
                    <form action="{{ route('orderPoint') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" hidden value="{{ $package->id }}" name="point_package_id">
                        <input type="file" name="screenshot">
                        <p class=" mt-3">ဆက်သွယ်ရန် ဖုန်းနံပါတ်</p>
                        <div class="d-flex justify-content-center">
                            <input type="text" name="phone" class="form-control w-50" placeholder="Enter phone number"
                                value="{{ Auth::user()->phone }}">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary text-white">ဝယ်ယူမည်</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5">
                <p class="text-center"><u>ဝယ်ယူနည်း</u></p>
                <ul>
                    <li>ဝယ်လိုသော ပွိုင့် ပက်ကေ့ ကိုရွေးချယ်ပြီး ကျသင့်သော ဈေးနှုန်းကို ကြည့်ပါ။</li>
                    <li>ကျသင့်သော ငွေတန်ဖိုးကို အောက်တွင် ပြထားသည် KBZ Pay , Wave Money , AYA Pay အကောင့်များထဲမှ
                        အဆင်ပြေသော တစ်ခုနှင့် လွဲနိုင်ပါသည်။ </li>
                    <li>ငွေလွဲပြီးကြောင်း Screenshot အား <u>Screenshot ပို့ရန်</u> တွင် ပုံရွေးကာ ပေးပို့ပါ။
                    </li>
                </ul>
            </div>
            <div class="mt-5">
                <p class="text-center"><u>ငွေလွဲရန် အကောင့်များ</u></p>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="{{ asset('images/assets/payment_logo/kbzpay.jpg') }}" class="card-img w-50"
                                alt="">
                            <h5 class="mt-2">09770204208</h5>
                            <p>Sai Main Seng Kham</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="{{ asset('images/assets/payment_logo/wavemoney.png') }}" class="card-img w-50"
                                alt="">
                            <h5 class="mt-2">09770204208</h5>
                            <p>Sai Main Seng Kham</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="{{ asset('images/assets/payment_logo/ayapay.jpg') }}" class="card-img w-50"
                                alt="">
                            <h5 class="mt-2">09770204208</h5>
                            <p>Sai Main Seng Kham</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


</div>

@endsection
