<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Stock;

class PagesController extends Controller
{
    //Страница Каталога
    public function catalog_index(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->get();
        //Фильтрация и вывод
        $filter = $request->get('filter');
        if($filter){
            if($filter == 'Все'){
                $products = Product::orderBy('id', 'desc')->paginate(8);
                $filter = false;
            } else{
                $products = Product::orderBy('id', 'desc')->where('category', $filter)->paginate(8);
            }
        } else{
            $products = Product::orderBy('id', 'desc')->paginate(8);
        }
		return view('catalog',[
            'products' => $products,
            'categories' => $categories,
            'filter' => $filter,
		]);
    }

    //Страница Акций
    public function stocks_index()
    {
        $stocks = Stock::orderBy('id', 'desc')->paginate(6);
        $stocks_count = Stock::count();
        return view('stocks',[
            'stocks' => $stocks,
            'stocks_count' => $stocks_count,
        ]);
    }

    //Страница Товара
    public function product_index(Product $prod)
    {
        return view('productItem', [
            'prod' => $prod,
        ]);
    }
}
