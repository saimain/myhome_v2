<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGuideController extends Controller
{
    public function viewGuide()
    {
        return view('user.user_guide');
    }
}
