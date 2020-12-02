<?php

namespace App\Http\Controllers\User;

use App\Models\Property;
use App\Models\SaveProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SavePropertyController extends Controller
{


    public function viewSaved()
    {
        $saved_properties = Auth::user()->save_properties;
        return view('user.dashboard.saved_properties', compact('saved_properties'));
    }

    public function saveProperty($id)
    {
        $user = Auth::user();
        $property = Property::find($id);

        $new_save = new SaveProperty();
        $new_save->user_id = $user->id;
        $new_save->property_id = $id;
        $new_save->save();

        Alert::success('Saved', 'Post saved to your account.');
        return back();
    }
}
