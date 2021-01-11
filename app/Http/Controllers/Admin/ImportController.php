<?php

namespace App\Http\Controllers\Admin;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\UsersPointImport;
use App\Imports\UsersPropertiesImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importUsers(Request $request)
    {
        $file = $request->file('users_file');
        $import = new UsersImport();
        $import->import($file);
        if ($import->errors()) {
            return back()->with('users.import.error', 'Users Import Error.');
        } else {
            return back()->with('users.import.success', 'Users Import Success.');
        }
    }

    public function importUsersPoint(Request $request)
    {
        $file = $request->file('users_point_file');
        $import = new UsersPointImport();
        $import->import($file);
        if ($import->errors()) {
            return back()->with('users.point.import.error', 'Users Point Import Error.');
        } else {
            return back()->with('users.point.import.success', 'Users Point Import Success.');
        }
    }

    public function importUsersProperties(Request $request)
    {
        $file = $request->file('users_properties_file');
        $import = new UsersPropertiesImport();
        $import->import($file);
        dd($import->errors());
        if ($import->errors()) {
            return back()->with('users.properties.import.error', 'Users Properties Import Error.');
        } else {
            return back()->with('users.properties.import.success', 'Users Properties Import Success.');
        }
    }
}
