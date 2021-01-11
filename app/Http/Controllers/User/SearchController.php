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
            $properties = Property::where('title', 'like', '%' . $request->name)
                ->orWhere('region_id', $request->region)
                ->orWhere('township_id', $request->township)
                ->orWhere('sale_rent', $request->sale_rent)
                ->orWhere('type', $request->type)
                ->get();
            return view('user.search_property', compact('properties'));
        } else {
            return view('user.search_property');
        }
    }

    public function searchPropertyPost(Request $request)
    {
        $queries = '?';

        if ($request->has('name')) {
            if ($request->name != '') {
                $queries = $queries . 'name=' . $request->name;
            }
        }
        if ($request->has('region_id')) {
            if ($request->region_id != 'Region') {
                $queries = $queries . '&region=' . $request->region_id;
            }
        }
        if ($request->has('township_id')) {
            if ($request->township_id != 'Township') {
                $queries = $queries .   '&township=' . $request->township_id;
            }
        }
        if ($request->has('sale_rent')) {
            if ($request->sale_rent != 'Sale and Rent') {
                $queries = $queries .   '&sale_rent=' . $request->sale_rent;
            }
        }
        if ($request->has('type')) {
            if ($request->type != 'Type') {
                $queries = $queries .   '&type=' . $request->type;
            }
        }
        if ($request->has('price_from')) {
            if ($request->price_from != 'Price (From)') {
                $queries = $queries .   '&price_from=' . $request->price_from;
            }
        }
        if ($request->has('price_to')) {
            if ($request->price_to != 'Price (To)') {
                $queries = $queries .   '&price_to=' . $request->price_to;
            }
        }

        $queries = $queries;

        return redirect($request->fullUrl() . $queries);
    }
}
