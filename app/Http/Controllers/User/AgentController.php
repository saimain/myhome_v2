<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function viewAgent()
    {
        $agents = User::where('is_agent', true)->orderBy('created_at', 'DESC')->paginate(6);
        return view('user.agents', compact('agents'));
    }

    public function viewAgentDetail($name)
    {
        $agent = User::where('agent_name', $name)->first();
        return view('user.agent_detail', compact('agent'));
    }
}
