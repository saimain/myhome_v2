<?php

namespace App\Http\Controllers\User;

use App\Models\PointOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PointOrderController extends Controller
{
    public function orderPoint(Request $request)
    {
        $request->validate([
            'screenshot' => 'required',
            'phone' => 'required',
            'point_package_id' => 'required'
        ]);

        $incompleted_order = PointOrder::where('user_id', Auth::id())->where('is_success', false)->first();
        if ($incompleted_order == null) {

            $order_number = IdGenerator::generate(['table' => 'point_orders', 'field' => 'order_number', 'length' => 8, 'prefix' => 'MHP']);


            $new_order = new PointOrder();
            $new_order->user_id = Auth::id();
            $new_order->point_package_id = $request->point_package_id;

            $image_name = time() . rand() . '.' . $request->file('screenshot')->getClientOriginalExtension();
            $path = public_path('/storage/point_order/');

            $request->file('screenshot')->move($path, $image_name);
            $new_order->image =  $image_name;
            $new_order->phone = $request->phone;
            $new_order->order_number = $order_number;
            $new_order->save();

            Alert::success('Order Success', 'Thanks you , We will contact you soon.');
            return back();
        } else {
            Alert::error('Order Error', 'Sorry , the recent order your have done was not transfer yet.');
            return back();
        }
    }
}
