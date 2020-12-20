<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PropertyController extends Controller
{
    public function viewProperty()
    {
        $properties = Property::all();
        return view('dashboard.all_property', compact('properties'));
    }

    public function viewFeaturedProperty()
    {
        $properties = Property::where('is_boosted', true)->get();
        return view('dashboard.all_property', compact('properties'));
    }

    public function viewUserProperty()
    {
        $properties = Property::where('as_agent', false)->get();
        return view('dashboard.user_property', compact('properties'));
    }
    public function viewAgentProperty()
    {
        $properties = Property::where('as_agent', true)->get();
        return view('dashboard.agent_property', compact('properties'));
    }

    public function deleteProperty($id)
    {
        $property = Property::find($id);
        $images =  json_decode($property->images);
        $destinationPath = public_path('/storage/property_image/');
        foreach ($images as $image) {
            unlink($destinationPath . $image);
        }
        $property->delete();
        return back();
    }
}
