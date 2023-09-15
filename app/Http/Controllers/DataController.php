<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Query;
use App\Models\Order;

class DataController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        for ($i = 0; $i < count($data['name']); $i++) {
            $name = $data['name'][$i];
            $email = $data['email'][$i];
            $order = $data['order'];
            DB::table('email')->insert([
                'name' => $name,
                'email' => $email,
                'order_id' => $order,
            ]);
        }
        return redirect()->route('order');
    }

    public function query(Request $request)
    {

        $query = new Query;
        $query->first_name = $request['firstname'];
        $query->last_name = $request['lastname'];
        $query->email = $request['email'];
        $query->message = $request['message'];
        $query->save();
        // return view('contactus');
        return redirect()->back()->with(['data' => 'Your Message has been Recieved Successfully.']);
    }

    public function c_order(Request $request)
    {
        $email = auth()->user()->email;
        $order = new Order;
        $order->firstname = $request['firstname'];
        $order->lastname = $request['lastname'];
        $order->mobile = $request['mobile'];
        $order->address = $request['address'];
        $order->image_src = $request['image_src'];
        $order->delivery_method = $request['method'];
        $order->email = $request['email'];
        $order->userEmail = $email;
        $order_id = $order->save() ? $order->id : null;

        if ($request['method'] == "Home") {
            $order = Order::where('userEmail', $email)->get();
            return view('order', ['order' => $order]);
        } else {
            return redirect()->route('list', ['order' => $order_id]);
            // dd($order_id);
        }
    }

    public function order(Request $request)
    {
        $order = DB::table('order')
            ->select('id', 'firstname', 'userEmail', 'delivery_method', 'status')
            ->get();

        return view('order', ['order' => $order]);
    }
}
