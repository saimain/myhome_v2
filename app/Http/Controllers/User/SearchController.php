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
        if ($request) {
            $data = json_encode($request->all());
            return $data->name;
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
        return redirect($request->fullUrlWithQuery($queries));
    }
}
