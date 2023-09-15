<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function view(Request $request)
    {
        $order = DB::table('order')
            ->select('id', 'firstname', 'userEmail', 'delivery_method', 'status')
            ->get();
            // return redirect()->back();
        return view('admin.order', ['order' => $order]);
    }

    public function edit($id, $status)
    {
        $order = Order::findOrFail($id);

        $order->status = $status;
        $order->save();

        return redirect()->back();
    }
}
