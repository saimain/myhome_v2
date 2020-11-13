<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PointPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PointPackageController extends Controller
{
    public function pointPackage()
    {
        return view('dashboard.point_package');
    }

    public function addPointPackageForm()
    {
        return view('dashboard.add_point_package');
    }

    public function addPointPackage(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'point' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:10000',
        ]);

        if ($validator->fails()) {
            return;
        } else {
            $new_package = new PointPackage();
            $new_package->name = $request->name;
            $new_package->description = $request->description;
            $new_package->point = $request->point;
            $new_package->price = $request->price;

            $image_name = time() . rand() . $request->file('image')->getClientOriginalExtension();
            $path = public_path('/storage/point_package/');

            $request->file('image')->move($path, $image_name);
            $new_package->image_url = $path . '.' . $image_name;
            $new_package->save();

            return 'sdklja';
        }
    }
}
