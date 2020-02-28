<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Image;

class SliderController extends Controller
{
    //Отображение страницы управления главным слайдером
    public function index()
    {
        $slides = Slider::orderBy('id', 'desc')->get();
        return view('admin.slider',[
            'slides' => $slides,
        ]);
    }

    //Загрузка слайдера в БД
    public function upload(Request $request)
    {
        $slide = new Slider;
        $slide -> link = $request -> link;

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $image = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save( public_path('/img/uploads/slider/' . $image ));

       		$slide -> urlImg = $image;
        }

    	$slide -> save();
    	return redirect('admin/slider');
    }

    //Удаление слайдера из БД
    public function delete(Slider $slide)
    {
        $slide -> delete();
        unlink(public_path('/img/uploads/slider/' . $slide -> urlImg));

        return redirect('/admin/slider');
    }
}
