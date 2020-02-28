@extends('layouts.header')

@section('title')
    <title>WearMeShell | Корзина</title>
@endsection

@section('content')

<section class="stocks-top">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="title">Корзина</div>
            </div>
        </div>
    </div>
</section>
@if ($order->getFullPrice() !== 0)
<section class="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-page__title">
                    <div class="cart-page__title--item fs">Товар</div>
                    <div class="cart-page__title--item sc">Количество</div>
                    <div class="cart-page__title--item th">Цена</div>
                    <div class="cart-page__title--item fo">Стоимость</div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($order->products as $prod)
            <div class="col-12">
                <div class="cart-page__order">
                    <div class="cart-page__order--product">
                        <div class="image">
                            <img src="/img/uploads/products/{{ $prod->url_img }}" alt="{{ $prod->name }}" width="83" height="115">
                        </div>
                        <div class="name">{{ $prod->name }}</div>
                    </div>
                    <div class="cart-page__order--count">
                        <form action="{{route('cart-add', $prod->id)}}" method="POST">
                            @csrf
                            <button type="submit">+</button>
                        </form>
                        <div class="count-cart">{{ $prod->pivot->count }}</div>
                        <form action="{{route('cart-remove', $prod->id)}}" method="POST">
                            @csrf
                            <button type="submit">-</button>
                        </form>
                    </div>
                    <div class="cart-page__order--price">
                        <span>Цена: </span>
                        {{ $prod->price }} руб.
                    </div>
                    <div class="cart-page__order--sum">
                        <span>Сумма: </span>
                        {{ $prod->getPrice() }} руб.
                    </div>
                </div>
            </div>
            @endforeach   
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cart-page__buy">
                    <div class="cart-page__buy--total">Итого: <span>{{$order->getFullPrice()}} руб.</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="confirm-cart">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="title cart-title">Подтверждение заказа</div>
            </div>
            <div class="col-12 d-flex justify-content-center"><h3 style="text-align: center">Введите свои данные и мы свяжемся с Вами для уточнения заказа</h3></div>
            <div class="col-12 d-flex justify-content-center">
                <form action="{{route('cart-confirm')}}" class="confirm-cart__form" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Имя" required>
                    <input id="phone" type="text" name="phone" placeholder="Телефон" required>
                    <button type="submit">Оформить заказ</button>
                </form>
            </div>
        </div>
    </div>
</section>

@else
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <h3 style="text-align: center">Ваша корзина пуста -><a class="ml-1 cart-link" style="color: #0085FF; " href="{{route('catalog')}}">Перейти в каталог</a></h3>
        </div>
    </div>
</div>
@endif


@include('layouts.scripts')

<script>
$(function(){
  $("#phone").mask("8(999) 999-9999");
});
</script>

@endsection