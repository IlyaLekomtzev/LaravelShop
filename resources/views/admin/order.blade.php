@extends('layouts.app')

@section('title')Содержимое заказа - {{$order->id}}@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin')}}">< Назад</a>
                    <span class="admin-card-title">Заказ №{{$order->id}}</span>
                </div>

                <div class="card-body row">
                    @foreach($products as $prod)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <img src="/img/uploads/products/{{ $prod->url_img }}" width="100%">
                        <p class="mt-2">{{ $prod->category }}</p>
                        <h4 class="mt-2">{{ $prod->name }}</h4>
                        <h5 class="mt-2">Арт.{{ $prod->articul }}</h5>
                        <h4 class="mt-2">{{ $prod->price }} руб.</h4>
                        <h4>Кол-во: {{ $prod->pivot->count }}</h4>
                        <h2>{{ $prod->getPrice() }} руб.</h2>
                        <hr>
                    </div>
                    @endforeach

                    <div class="col-12">
                        <form action="{{route('order-delete', $order)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection