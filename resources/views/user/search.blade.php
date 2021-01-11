@php
$regions = DB::table('regions')->get();
@endphp


<div class="container search_div py-5">
    <div class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="h4 mb-5 text-center text-white">စိတ်တိုင်းကျအိမ်ခြံမြေကိုရှာဖွေလိုက်ပါ</p>
                    <form action="{{ route('searchProperty') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Name (or) Keywords"
                            class="form-control mt-1 mr-md-2">
                        <div class="d-block d-md-flex ">
                            <select class="custom-select  mt-1 mr-md-2" id="region_select" name="region_id">
                                <option>Region</option>
                                @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{$region->region_name}}</option>
                                @endforeach
                            </select>
                            <select class="custom-select  mt-1 mr-md-2" id="township_select" name="township_id">
                                <option>Township</option>
                                <option value="">Please select Region first.</option>
                            </select>
                            <select class="custom-select mt-1" name="sale_rent">
                                <option>Sale and Rent</option>
                                <option value="sale">For Sale</option>
                                <option value="rent">For Rent</option>
                            </select>
                        </div>
                        <div class="d-block d-md-flex">
                            <select class="custom-select mt-1 mr-md-2" name="type">
                                <option>Type</option>
                                <option value="apartmant">Apartment</option>
                                <option value="condo">Condo</option>
                                <option value="private house">Private House</option>
                                <option value="shop">Shop</option>
                                <option value="office">Office</option>
                            </select>
                            <select class="custom-select mt-1 mr-md-2" name="price_from">
                                <option>Price (From)</option>
                                <option value="50">50 Lakh</option>
                                <option value="100">100 Lakh</option>
                                <option value="200">200 Lakh</option>
                                <option value="300">300 Lakh</option>
                                <option value="400">400 Lakh</option>
                                <option value="500">500 Lakh</option>
                                <option value="600">600 Lakh</option>
                                <option value="700">700 Lakh</option>
                                <option value="800">800 Lakh</option>
                                <option value="900">900 Lakh</option>
                                <option value="1000">1000 Lakh</option>
                                <option value="1500">1500 Lakh</option>
                                <option value="2000">2000 Lakh</option>
                                <option value="2500">2500 Lakh</option>
                                <option value="3000">3000 Lakh</option>
                            </select>
                            <select class="custom-select mt-1" name="price_to">
                                <option>Price (To)</option>
                                <option value="50">50 Lakh</option>
                                <option value="100">100 Lakh</option>
                                <option value="200">200 Lakh</option>
                                <option value="300">300 Lakh</option>
                                <option value="400">400 Lakh</option>
                                <option value="500">500 Lakh</option>
                                <option value="600">600 Lakh</option>
                                <option value="700">700 Lakh</option>
                                <option value="800">800 Lakh</option>
                                <option value="900">900 Lakh</option>
                                <option value="1000">1000 Lakh</option>
                                <option value="1500">1500 Lakh</option>
                                <option value="2000">2000 Lakh</option>
                                <option value="2500">2500 Lakh</option>
                                <option value="3000">3000 Lakh</option>
                            </select>
                        </div>
                        <div class="mt-1">
                            <button type="submit"
                                class="btn btn-primary text-center w-100 text-white mt-1">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 rounded" style="background-color: rgba(0,0,0,0.1);">
                    <li style="list-style: none; color:gray">
                        <a>klj</a>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
