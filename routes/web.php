<?php
//Маршруты Магазина

//Главная
Route::get('/', 'StartController@index');

//Каталог
Route::get('/catalog', 'PagesController@catalog_index')->name('catalog');
//Каталог
Route::get('/catalog/{prod}', 'PagesController@product_index')->name('product-page');

//Акции
Route::get('/stocks', 'PagesController@stocks_index')->name('stocks');

//Корзина
Route::get('/cart', 'CartController@index')->name('cart');

Route::post('/cart/confirm', 'CartController@cartConfirm')->name('cart-confirm');
//Добавление в корзину
Route::post('/cart/add/{id}', 'CartController@cartAdd')->name('cart-add');
//Удаление из корзины
Route::post('/cart/remove/{id}', 'CartController@cartRemove')->name('cart-remove');

//Авторизация, Регисрация и Выход
Auth::routes();

//Группа администраторского доступа
Route::group(['middleware' => 'auth'], function(){
    //Админка
    Route::get('/admin', 'HomeController@index')->name('admin');

    //Управление слайдером
    Route::get('/admin/slider', 'SliderController@index')->name('slider');
    Route::post('/admin/slider/upload', 'SliderController@upload');
    Route::delete('/admin/slider/delete/{slide}', 'SliderController@delete');

    //Управление категориями
    Route::get('/admin/category', 'CategoryController@index')->name('category');
    Route::post('/admin/category/upload', 'CategoryController@upload');
    Route::delete('/admin/category/delete/{category}', 'CategoryController@delete');
    Route::get('/admin/category/edit/{category}', 'CategoryController@editShow')->name('category-edit');
    Route::post('/admin/category/edit/save/{category}', 'CategoryController@edit')->name('category-edit-save');

    //Управление товарами
    Route::get('/admin/product', 'ProductController@index')->name('product');
    Route::post('/admin/product/upload', 'ProductController@upload');
    Route::delete('/admin/product/delete/{product}', 'ProductController@delete');
    Route::get('/admin/product/edit/{product}', 'ProductController@editShow')->name('prod-edit');
    Route::post('/admin/product/edit/save/{product}', 'ProductController@edit')->name('prod-edit-save');
    //Добавление товара в топ
    Route::post('/admin/product/update/top_on/{product}', 'ProductController@top_on');
    Route::post('/admin/product/update/top_off/{product}', 'ProductController@top_off');

    //Управление акциями
    Route::get('/admin/stock', 'StockController@index')->name('stock');
    Route::post('/admin/stock/upload', 'StockController@upload');
    Route::delete('/admin/stock/delete/{stock}', 'StockController@delete');

    //Отображение отдельного заказа
    Route::get('/admin/orders/{order}', 'HomeController@order')->name('order');
    Route::delete('/admin/orders/{order}/delete', 'HomeController@orderDelete')->name('order-delete');
});
