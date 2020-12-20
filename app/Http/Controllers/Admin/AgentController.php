<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function viewAgent()
    {
        $agents = User::where('is_agent', true)->get();
        return view('dashboard.agents', compact('agents'));
    }
}
