@extends('layouts.header')

@section('title')
    <title>WearMeShell | Каталог
        @if ($filter) 
        | {{$filter}}
        @endif
    </title>
@endsection

@section('content')

<section class="catalog-top">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="title">Каталог</div>
            </div>
            @if ($filter)
                <div class="col-12 d-flex justify-content-center"><h3>/ {{$filter}}</h3></div>
            @endif 
            <div class="col-12 d-flex justify-content-center">
                <form action="{{ route('catalog') }}" class="catalog-top__search" method="GET">
                    <div class="catalog-top__search--select" style="width:170px;">
                        <select name="filter">
                            <option value="Все">Все</option>
                            @foreach ($categories as $cat)
                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit">Показать</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="catalog">
    <div class="container">
        <div class="row">
            @foreach ($products as $prod)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <a href="{{route('product-page', $prod)}}" class="card__image">
                        <img src="/img/uploads/products/{{ $prod->url_img }}" alt="{{ $prod->name }}" width="100%">
                    </a>
                    <div class="card__title">{{ $prod->name }}</div>
                    <div class="card__price">{{ $prod->price }} руб.</div>
                    <form class="card__btn" action="{{route('cart-add', $prod)}}" method="POST">
                        @csrf
                        <button>
                            <span>В корзину</span>
                            <img src="{{asset('src/img/cart-btn.svg')}}" alt="cartBtn">
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="catalog-pagination">
    <div class="container">
        <div class="row">
            <div class="col-12">{{$products->links()}}</div>
        </div>
    </div>
</section>

@include('layouts.footer')
@include('layouts.scripts')

@endsection