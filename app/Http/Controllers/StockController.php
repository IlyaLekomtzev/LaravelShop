<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use Image;

class StockController extends Controller
{
    //Отображение страницы управления акциями
    public function index()
    {
        $stocks = Stock::orderBy('id', 'desc')->get();
        return view('admin.stock', [
            'stocks' => $stocks,
        ]);
    }

    //Загрузка акции в БД
    public function upload(Request $request)
    {
        $stock = new Stock;
        $stock -> title = $request -> title;
        $stock -> descr = $request -> descr;

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $image = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save( public_path('/img/uploads/stocks/' . $image ));
       		$stock -> url_img = $image;
        }

    	$stock -> save();
    	return redirect('admin/stock');
    }

    //Удаление акции из БД
    public function delete(Stock $stock)
    {
        $stock -> delete();
        unlink(public_path('/img/uploads/stocks/' . $stock -> url_img));
        return redirect('/admin/stock');
    }
}
