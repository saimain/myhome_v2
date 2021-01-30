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
        if (count($request->all()) > 0) {
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

    public function searchPropertyPost(Request $request, Property $property)
    {
        $property = $property->newQuery();


        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = "?keyword=" . $request->keyword . "&";
        } else {
            $keyword = "?";
        }

        if ($request->has('min_price') && $request->min_price != 'Price (From)') {
            $min_price = "min_price=" . $request->min_price . "&";
        } else {
            $min_price = "";
        }


        if ($request->has('max_price') && $request->min_price != 'Price (From)') {
            $max_price = "max_price=" . $request->max_price . "&";
        } else {
            $max_price = "";
        }

        if ($request->has('region')) {
            if ($request->region != 0 && $request->region != 'Region') {
                $region = "region=" . $request->region . "&";
            } else {
                $region = "";
            }
        }

        if ($request->has('township')) {
            if ($request->township != 0 && $request->township != 'Township') {
                $township = "township=" . $request->township . "&";
            } else {
                $township = "";
            }
        }

        if ($request->has('sale_or_rent') && $request->sale_or_rent != 'Sale and Rent') {
            $sale_or_rent = "sale_or_rent=" . $request->sale_or_rent . "&";
        } else {
            $sale_or_rent = "";
        }

        if ($request->has('type')) {
            if ($request->type != 'Type') {
                $type = "type=" . $request->type . "&";
            } else {
                $type = "";
            }
        }

        return redirect("/properties" . $keyword . $min_price . $max_price . $region . $township . $sale_or_rent . $type);
    }
}
