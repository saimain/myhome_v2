<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function viewAdmin()
    {
        $admins = Admin::all();
        return view('dashboard.admin', compact('admins'));
    }

    public function addAdmin(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back();
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return back();
    }
}
