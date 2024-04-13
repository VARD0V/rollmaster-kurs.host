<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Models\Carts;
use App\Models\Order;
use App\Models\Orderlist;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show(Request $request){

        $user = auth()->user();

        $cartItems = \App\Models\Carts::where('user_id', $user->id)
            ->with('product') // Убедитесь, что у вас есть связь product в модели Carts
            ->get();

        return response()->json(['cart' => $cartItems]);
    }
    public function checkout(Request $request){
        $user_id = $request->user()->id;

        $carts = Carts::where('user_id', $user_id)->get();

        foreach ($carts as $cart){
            $product = Products::find($cart->product_id);
            if ($product->quantity < $cart->quantity) {
                throw new ApiException(500, 'Не работает');
            }
        }

        $order = new Order(['user_id' => $user_id]);
        $order->save();

        foreach ($carts as $cart){
            $product = Products::find($cart->product_id);
            $newOrderlist = new Orderlist();
            $newOrderlist->order_id = $order->id;
            $newOrderlist->product_id = $cart->product_id;
            $newOrderlist->quantity = $cart->quantity;
            $newOrderlist->price = $product->price;
            $newOrderlist->save();

            $product->quantity -= $cart->quantity;
            $product->save();
        }
        Carts::where('user_id', $user_id)->delete();
        return response()->json($order)->setStatusCode(200, 'Заказ оформлен');
    }
}
