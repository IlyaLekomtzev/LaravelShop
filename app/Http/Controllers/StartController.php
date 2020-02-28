<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Stock;

class StartController extends Controller
{
    //Отображение главной(стартовой) страницы
    public function index()
    {
        $slides = Slider::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')->limit(8)->get();
        $products_top = Product::orderBy('id', 'desc')->where(['top' => '1'])->limit(8)->get();
        $count = Slider::count();
        $stocks = Stock::orderBy('id', 'desc')->limit(2)->get();
        $stock_count = Stock::count();
        return view('start',[
            'slides' => $slides,
            'count' => $count,
            'products' => $products,
            'products_top' => $products_top,
            'stocks' => $stocks,
            'stock_count' => $stock_count,
        ]);
    }
}
