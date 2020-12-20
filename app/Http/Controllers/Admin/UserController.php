<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function viewUser()
    {
        $users = User::where('is_agent', false)->get();
        return view('dashboard.users', compact('users'));
    }
}
