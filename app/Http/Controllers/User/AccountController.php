<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('user.dashboard.my_account');
    }

    public function upgradeAgentForm()
    {
        return view('user.dashboard.upgrade_agent');
    }

    public function upgradeAgent(Request $request)
    {

        $validatedData = $request->validate([
            'agent_name' => 'required',
            'agent_type' => 'required',
            'agent_phone' => 'required',
            'agent_address' => 'required',
            'agent_about' => 'required',
            'agent_profile' => 'required',
        ]);

        $user = User::find(Auth::id());
        $user->is_agent = true;
        $user->agent_name = $request->agent_name;
        $user->agent_type = $request->agent_type;
        $user->agent_phone = $request->agent_phone;
        $user->agent_address = $request->agent_address;
        $user->agent_about = $request->agent_about;

        if ($request->file('agent_profile')) {
            $destinationPath = public_path('/storage/agent_profile/');
            $image_name = time() . rand() . '.' . $request->file('agent_profile')->getClientOriginalExtension();
            $request->file('agent_profile')->move($destinationPath, $image_name);
        }

        $user->agent_profile = $image_name;
        $user->update();

        return redirect('/my/account')->withSuccess('Agent upgrade success. Your account is now Agent.');
    }

    public function editAgent(Request $request)
    {
        $agent = User::find(Auth::id());

        $agent->agent_name = $request->agent_name;
        $agent->agent_type = $request->agent_type;
        $agent->agent_phone = $request->agent_phone;
        $agent->agent_address = $request->agent_address;
        $agent->agent_about = $request->agent_about;

        $agent->update();
        return back()->withSuccess('Agent informations updated.');
    }
}
