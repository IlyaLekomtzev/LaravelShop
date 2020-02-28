@extends('layouts.app')

@section('title')Управление сайтом@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Управление контентом</div>

                <div class="card-body">
                    <ul class="admin-home-links">
                        <li>
                            <a href="{{route('slider')}}">Главный слайдер</a>
                            <span class="ml-2 home-count">{{$slider_count}}</span>
                        </li>
                        <hr>
                        <li class="d-flex">
                            <a href="{{route('category')}}">Категории товаров</a>
                            <span class="ml-2 home-count">{{$cat_count}}</span>
                        </li>
                        <hr>
                        <li class="d-flex">
                            <a href="{{route('product')}}">Товары</a>
                            <span class="ml-2 home-count">{{$prod_count}}</span>
                        </li>
                        <hr>
                        <li class="d-flex">
                            <a href="{{route('stock')}}">Акции</a>
                            <span class="ml-2 home-count">{{$stock_count}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Заказы</div>

                <div class="card-body">
                    @foreach($orders as $order)
                        <h5>ID заказа: {{$order->id}}</h5>
                        <p>Сумма: {{$order->getFullPrice()}} руб.</p>
                        <h5>Имя покупателя: <b>{{$order->name}}</b></h5>
                        <h5>Номер телефона: <b>{{$order->phone}}</b></h5>
                        <div class="d-flex">
                            <a href="{{route('order', $order)}}" class="btn btn-primary">Показать</a>
                            <form class="ml-3" action="{{route('order-delete', $order)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                        
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
