@extends('layouts.header')

@section('title')
    <title>{{$prod->name}}</title>
@endsection

@section('content')

<section class="prod-page mt-4">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-4">
                <img src="/img/uploads/products/{{ $prod->url_img }}" alt="{{ $prod->name }}" width="100%">
            </div>
            <div class="col-6">
                <div class="prod-page__content">
                    <h1>{{$prod->name}}</h1>
                    <p style="opacity: 0.7"><i>{{$prod->category}} / Артикул {{$prod->articul}}</i></p>
                    <h3 class="mt-3">Сезон: {{$prod->season}}</h3>
                    <h3>Размеры: {{$prod->sizes}}</h3>
                    <h3>Цвета: {{$prod->colors}}</h3>
                    <h2 class="mt-5">{{$prod->price}} руб.</h2>
                    <form class="card__btn product-page-btn" action="{{route('cart-add', $prod)}}" method="POST">
                        @csrf
                        <button>
                            <span>В корзину</span>
                            <img src="{{asset('src/img/cart-btn.svg')}}" alt="cartBtn">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.scripts')

@endsection