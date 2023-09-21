<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
        public function view()
    {
        return view('cart', ['cart' => Cart::all()]);
    }

    public function cart_add(Request $request)
    {
        $user_id = auth()->user()->id;
        $cart = new Cart;
        $cart->image = $request['image'];
        $cart->price = $request['price'];
        $cart->user_id = $user_id;
        $cart->save();

        return redirect()->route('home');
    }

     public function cart_del($id)
    {
        $cart = Cart::find($id)
            ->delete();

        return redirect()->route('cart');
    }

    public function cart_place(Request $request)
    {
        
        $data = [
            'image' => $request['image'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
        ];
        
        if($request->has('cart_id'))
        {
            $cart = Cart::find($request['cart_id'])
                ->delete();
        }

        return view('payment', ['data' => $data]);
    }

}
