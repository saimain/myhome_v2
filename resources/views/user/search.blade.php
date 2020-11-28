@php
$regions = DB::table('regions')->get();
@endphp


<div class="search_div py-5 mb-3">
    <div class="container">
        <p class="text-center text-white">သင့်ရဲ့စိတ်တိုင်းကျအိမ်ခြံမြေကိုရှာဖွေလိုက်ပါ</p>
        <form action="#">
            @csrf
            <input type="text" placeholder="Name (or) Keywords" class="form-control mt-1 mr-md-2">
            <div class="d-block d-md-flex ">
                <select class="custom-select  mt-1 mr-md-2" id="region_select" name="region_id">
                    <option selected>Region</option>
                    @foreach ($regions as $region)
                    <option value="{{$region->id}}">{{$region->region_name}}</option>
                    @endforeach
                </select>
                <select class="custom-select  mt-1 mr-md-2" id="township_select" name="township_id">
                    <option selected>Township</option>
                    <option value="">Please select Region first.</option>
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
