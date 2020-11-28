<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PointOrder;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;

class PointOrderController extends Controller
{
    public function allOrder()
    {
        $orders = PointOrder::all();
        return view('dashboard.all_point_orders', compact('orders'));
    }

    public function successOrder()
    {
        $orders = PointOrder::where('is_success', true)->get();
        return view('dashboard.success_point_orders', compact('orders'));
    }

    public function pendingOrder()
    {
        $orders = PointOrder::where('is_success', false)->get();
        return view('dashboard.pending_point_orders', compact('orders'));
    }

    public function transferOrder(Request $request)
    {
        $user = User::find($request->user_id);
        $order = PointOrder::find($request->order_id);

        $user_point = UserPoint::where('user_id', $user->id)->first();
        $user_point->points = $user_point->points + $order->package->point;
        $user_point->update();

        $order->is_success = true;
        $order->update();

        return back();
    }
}
