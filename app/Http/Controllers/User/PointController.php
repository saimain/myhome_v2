<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PointPackage;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function buyPoint()
    {
        $packages = PointPackage::all();
        return view('user.dashboard.buy_point', compact('packages'));
    }

    public function buyPointForm($id)
    {
        $package = PointPackage::find($id);
        return view('user.dashboard.buy_point_form', compact('package'));
    }
}
