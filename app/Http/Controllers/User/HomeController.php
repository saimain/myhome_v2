<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sale_properties = Property::where('is_boosted', false)->where('sale_rent', 'sale')->take(3)->get();
        $rent_properties = Property::where('is_boosted', false)->where('sale_rent', 'rent')->take(3)->get();
        $boosted_sale_properties = Property::where('is_boosted', true)->where('sale_rent', 'sale')->take(3)->get();
        $boosted_rent_properties = Property::where('is_boosted', true)->where('sale_rent', 'rent')->take(3)->get();
        return view("user.index", compact('sale_properties', 'rent_properties', 'boosted_sale_properties', 'boosted_rent_properties'));
    }
}
