<?php

namespace App\Http\Controllers;

use App\Mail\Invitation;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Email;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function view(Request $request)
    {
        $order = DB::table('order')
            ->select('id', 'firstname', 'userEmail', 'delivery_method', 'status')
            ->get();
        return view('admin.order', ['order' => $order]);
    }

    public function edit($id, $status)
    {
        $order = Order::findOrFail($id);
        
        if ($order->delivery_method === 'Email') {
            $emailList = Email::where('order_id', $id)->get();
            foreach ($emailList as $email) {
                Mail::to($email->email)->send(new Invitation($order, $email));
            }
            Mail::to($order->userEmail)->send(new OrderShipped($order));
            $order->status = $status;
            $order->save();
            return redirect()->back()->with('Success', 'Mail Sent Successfully');
        } else {

            Mail::to($order->userEmail)->send(new OrderShipped($order));
            $order->status = $status;
            $order->save();
            return redirect()->back()->with('Success', 'Mail Sent Successfully');
        }
    }
}
