<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{
    public function searchProperty(Request $request)
    {
        if (count($request->all())) {
            $data = $request->all();
            print_r($request->all());
            $properties = Property::where('title', 'like', '%' . $data[0]['name'])
                ->orWhere('region_id', $data[1]['region_id'])
                ->orWhere('township_id', $data[2]['township_id'])
                ->orWhere('sale_rent', $data[3]['sale_rent'])
                ->orWhere('type', $data[4]['type'])
                ->get();
            return view('user.search_property', compact('properties'));
        } else {
            return view('user.search_property');
        }
    }

    public function searchPropertyPost(Request $request)
    {
        $queries = [];
        if ($request->has('name')) {
            array_push($queries, ['name' => $request->name]);
        }
        if ($request->has('region_id')) {
            array_push($queries, ['region_id' => $request->region_id]);
        }
        if ($request->has('township_id')) {
            array_push($queries, ['township_id' => $request->township_id]);
        }
        if ($request->has('sale_rent')) {
            array_push($queries, ['sale_rent' => $request->sale_rent]);
        }
        if ($request->has('type')) {
            array_push($queries, ['type' => $request->type]);
        }
        if ($request->has('price_from')) {
            array_push($queries, ['price_from' => $request->price_from]);
        }
        if ($request->has('price_to')) {
            array_push($queries, ['price_to' => $request->price_to]);
        }
        return redirect($request->fullUrlWithQuery($queries));
    }
}
