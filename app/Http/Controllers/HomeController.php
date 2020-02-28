<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Product;
use App\Stock;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider_count = Slider::count();
        $cat_count = Category::count();
        $prod_count = Product::count();
        $stock_count = Stock::count();
        $orders = Order::where('status', '1')->get();
        return view('home', [
            'slider_count' => $slider_count,
            'cat_count' => $cat_count,
            'prod_count' => $prod_count,
            'stock_count' => $stock_count,
            'orders' => $orders,
        ]);
    }

    public function order(Order $order)
    {
        $products = $order->products()->get();
        return view('admin.order', [
            'products' => $products,
            'order' => $order,
        ]);
    }

    public function orderDelete(Order $order)
    {
        $order->delete();
        return redirect()->route('admin');
    }
}
