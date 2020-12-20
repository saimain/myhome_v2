<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertise;
use Illuminate\Support\Facades\Validator;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertises = Advertise::all();
        return view('dashboard.advertisement', compact('advertises'));
    }

    public function addAdsForm()
    {
        return view('dashboard.add_advertisement');
    }

    public function addAds(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        if ($validator->fails()) {
            return;
        } else {
            $new_ads = new Advertise();
            $new_ads->start = $request->start_date;
            $new_ads->end = $request->end_date;
            $new_ads->note = $request->note;
            $new_ads->url = $request->url;

            $image_name = time() . rand() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = public_path('/storage/advertise/');

            $request->file('image')->move($path, $image_name);
            $new_ads->image =  $image_name;
            $new_ads->save();

            return back();
        }
    }

    public function deleteAdvertise($id)
    {
        $ads = Advertise::find($id);
        $path = public_path('/storage/advertise/');
        unlink($path . $ads->image);
        $ads->delete();
        return back();
    }
}
