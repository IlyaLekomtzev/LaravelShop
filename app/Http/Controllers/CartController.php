<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class CartController extends Controller
{
    public function index()
    {
        $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
            return view('cart', compact('order'));
        } else{
            return redirect()->route('catalog');
        }
    }

    public function cartConfirm(Request $request)
    {
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect('/');
        }
        $order = Order::find($orderId);
       
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->status = 1;
        $order->save();

        session()->forget('orderId');

        return redirect('/');
    }

    public function cartAdd($productId)
    {
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else{
            $order = Order::find($orderId);
        }

        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else{
            $order->products()->attach($productId);
        }

        return redirect()->back();
    }

    public function cartRemove($productId)
    {
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);

        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            
            if($pivotRow->count < 2){
                $order->products()->detach($productId);
            } else{
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        return redirect()->back();
    }
}
