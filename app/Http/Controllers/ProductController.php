<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Image;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //Отображение страницы управления товарами
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.product', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    //Загрузка товара в БД
    public function upload(Request $request)
    {
        $product = new Product;
        $product -> articul = rand(000000000, 999999999);
        $product -> name = $request -> name;
        $product -> category = $request -> category;
        $product -> sizes = $request -> sizes;
        $product -> colors = $request -> colors;
        $product -> season = $request -> season;
        $product -> price = $request -> price;

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $image = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save( public_path('/img/uploads/products/' . $image ));
       		$product -> url_img = $image;
        }

    	$product -> save();
    	return redirect('admin/product');
    }

    //Удаление товара из БД
    public function delete(Product $product)
    {
        $product -> delete();
        unlink(public_path('/img/uploads/products/' . $product -> url_img));

        return redirect('/admin/product');
    }

    //Добавление товара в топ
    public function top_on(Product $product)
    {
        $id = $product->id;
        $status = '1';
        DB::update('update products set top = ? where id = ?',[$status,$id]);

        return redirect('/admin/product');
    }

    //Удаление товара из топ
    public function top_off(Product $product)
    {
        $id = $product->id;
        $status = '0';
        DB::update('update products set top = ? where id = ?',[$status,$id]);

        return redirect('/admin/product');
    }

    //Отображение страницы редактирования категории
    public function editShow(Product $product){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.edit.product', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    //Редактирование
    public function edit(Request $request, Product $product){
        $this->validate($request, [
            'name'=>'required',
            'category'=>'required',
            'season'=>'required',
            'sizes'=>'required',
            'colors'=>'required',
            'price'=>'required',
        ]);

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $image = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save( public_path('/img/uploads/products/' . $image ));
            $product -> url_img = $image;
        }

        $product->name = $request->name;
        $product->category = $request->category;
        $product->season = $request->season;
        $product->sizes = $request->sizes;
        $product->colors = $request->colors;
        $product->price = $request->price;

        $product->update();
        return redirect()->route('product');
    }
}
