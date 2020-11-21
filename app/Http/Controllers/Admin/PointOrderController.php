<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PointOrder;
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
}
