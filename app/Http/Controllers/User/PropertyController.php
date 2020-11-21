<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function uploadProperty()
    {
        $regions = DB::table('regions')->get();
        return view('user.dashboard.upload_property', compact('regions'));
    }

    public function postUploadProperty(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'region_id' => 'required',
            'township_id' => 'required',
            'type' => 'required',
            'area' => 'required',
            'bed_room' => 'required',
            'bath_room' => 'required',
            'phone' => 'required',
            'sale_rent' => 'required',
            'price' => 'required',
            'images' => 'required',
        ]);


        $new_property = new Property();
        $new_property->user_id = Auth::id();
        $new_property->title = $request->title;
        $new_property->region_id = $request->region_id;
        $new_property->township_id = $request->township_id;
        $new_property->type = $request->type;
        $new_property->price = $request->price;
        $new_property->area = $request->area;
        $new_property->bed_room = $request->bed_room;
        $new_property->bath_room = $request->bath_room;
        $new_property->description = $request->description;
        $new_property->phone = $request->phone;
        $new_property->sale_rent = $request->sale_rent;

        $images_arr = array();

        if ($images = $request->file('images')) {
            foreach ($images as $image) {
                $destinationPath = public_path('/storage/property_image/');
                $image_name = time() . rand() . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $image_name);
                array_push($images_arr, $image_name);
            }
            $images = json_encode($images_arr);
        }

        $new_property->images = $images;
        $new_property->save();

        return 'succes';
    }
}
