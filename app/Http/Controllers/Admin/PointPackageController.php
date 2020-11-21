<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PointPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PointPackageController extends Controller
{
    public function pointPackage()
    {
        $packages = PointPackage::all();
        return view('dashboard.point_package', compact('packages'));
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

            $image_name = time() . rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = public_path('/storage/point_package/');

            $request->file('image')->move($path, $image_name);
            $new_package->image =  $image_name;
            $new_package->save();

            return back();
        }
    }

    public function deletePointPackage($id)
    {
        $package = PointPackage::find($id);

        $image = public_path('/storage/point_package/' . $package->image);
        unlink($image);
        $package->delete();

        return back();
    }

    public function editPointPackageForm($id)
    {
        $package = PointPackage::find($id);
        return view('dashboard.edit_point_package', compact('package'));
    }

    public function updatePointPackage($id, Request $request)
    {

        $package = PointPackage::find($id);

        $package->name = $request->name;
        $package->description = $request->description;
        $package->point = $request->point;
        $package->price = $request->price;


        if ($request->file('image')) {

            $old_image = public_path('/storage/point_package/' . $package->image);
            unlink($old_image);

            $image_name = time() . rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = public_path('/storage/point_package/');
            $request->file('image')->move($path, $image_name);
            $package->image =  $image_name;
        }
        $package->update();

        return back();
    }
}
