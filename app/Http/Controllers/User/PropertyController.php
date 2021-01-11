<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyController extends Controller
{

    public function viewProperties()
    {
        $properties = Property::orderBy('created_at', 'DESC')->paginate(6);
        return view('user.properties', compact('properties'));
    }

    public function viewSaleProperties()
    {
        $properties = Property::where('sale_rent', 'sale')->orderBy('created_at', 'DESC')->paginate(6);
        return view('user.for_sale_properties', compact('properties'));
    }

    public function viewRentProperties()
    {
        $properties = Property::where('sale_rent', 'rent')->orderBy('created_at', 'DESC')->paginate(6);
        return view('user.for_rent_properties', compact('properties'));
    }


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

        if (Auth::user()->is_agent == true) {
            $as_agent = 1;
        } else {
            $as_agent = 0;
        }


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
        $new_property->as_agent = $as_agent;
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

        return back();
    }

    public function viewProperty($id)
    {
        $property = Property::find($id);
        $region = DB::table('regions')->where('id', $property->region_id)->first();
        $township = DB::table('townships')->where('id', $property->township_id)->first();
        return view('user.property', compact('property', 'region', 'township'));
    }

    public function deleteProperty($id)
    {
        $property = Property::find($id);

        if (Auth::user()->properties->contains($property)) {
            $property->delete();
            $images =  json_decode($property->images);
            $destinationPath = public_path('/storage/property_image/');
            foreach ($images as $image) {
                unlink($destinationPath . $image);
            }
        }
        return redirect('/');
    }

    public function editPrperty($id)
    {
        $property = Property::find($id);
        $regions = DB::table('regions')->get();

        if (Auth::user()->properties->contains($property)) {
            return view('user.dashboard.upload_property', compact('property', 'regions'));
        } else {
            return back();
        }
    }

    public function updateProperty(Request $request, $id)
    {
        $property = Property::find($id);
        $property->update($request->all());
        return redirect('/my');
    }

    public function boostProperty($id)
    {
        $property = Property::find($id);
        if ($property->user->id == Auth::id()) {
            $property->user->point->points = $property->user->point->points - 10;
            $property->user->point->update();
            $property->is_boosted = true;
            $property->boost_exp_date = Carbon::now()->addMonth();
            $property->update();
            Alert::success('Boost Success', 'Thanks you, You Post have been listed in Featured.');
            return back();
        } else {
            return back();
        }
    }
}
