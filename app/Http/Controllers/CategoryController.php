<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //Отображение страницы управления категориями
    public function index(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category', [
            'categories' => $categories,
        ]);
    }

    //Загрузка категории в БД
    public function upload(Request $request)
    {
        $category = new Category;
        $category -> name = $request -> name;

    	$category -> save();
    	return redirect('admin/category');
    }

    //Удаление категории из БД
    public function delete(Category $category)
    {
        $category -> delete();
        return redirect('/admin/category');
    }

    //Отображение страницы редактирования категории
    public function editShow(Category $category){
        return view('admin.edit.category', [
            'category' => $category,
        ]);
    }

    //Редактирование
    public function edit(Request $request, Category $category){
        $this->validate($request, [
            'nameEdit'=>'required',
        ]);

        $category->name = $request->nameEdit;
        $category->update();

        return redirect()->route('category');
    }
}
