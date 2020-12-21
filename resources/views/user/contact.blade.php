@extends('user.layouts.master')

@section('content')

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <div class="border-bottom">
                <h5 class="text-primary">Contact</h5>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="mt-3">
                <p>If u need help or dont know how to use, please read <a href="{{ url('/guide') }}"
                        class="text-primary">User Guide</a>.</p>
                <p class="text-dark"> <span class="">Myanmar </span> : <a href="tel:+95926120210"
                        class="h4 text-primary"><b>(+95)
                            926120210</b></a>
                </p>
                <p class="text-dark">Address :</p>
                <p class="text-dark"><a href="{{ url('/') }}">MyHomeMM.com</a></p>
                <p class="text-dark"><a href="mailto: service@myhomemm.com">service@myhomemm.com</a></p>
                <p class="text-dark">
                    No. 245 , Kyaik Ka San Road <br>
                    Tamwe Township, Yangon, Myanmar
                </p>
                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d217646.76398263453!2d95.9735022828026!3d16.915893949412617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ecc7a5fae025%3A0xefaaaf158bb12780!2sKyaik%20Ka%20San%20Rd%2C%20Yangon!5e0!3m2!1sen!2smm!4v1608400446579!5m2!1sen!2smm"
                        width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-center">
                <span class="text-primary h5">Contact Us</span>
            </div>
            <div class="mt-3 px-5">
                <form action="{{ url('contact') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Your Name" name="name" class="form-control">
                    <input type="email" placeholder="Email" name="email" class="form-control mt-3">
                    <input type="text" placeholder="Phone Number" name="phone" class="form-control mt-3">
                    <textarea name="message" id="" cols="30" rows="10" class="form-control mt-3"></textarea>
                    <button type="submit" class="btn btn-primary mt-3 text-white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
