@extends('layouts.header')

@section('title')
    <title>WearMeShell | Интернет-Шоурум</title>
@endsection

@section('content')

@if ($count > 0)
<section class="home-slider">
    <div class="swiper-container home">
        <div class="swiper-wrapper">
            @foreach ($slides as $slide)
                <div class="swiper-slide">
                    <a href="{{$slide->link}}">
                        <img src="/img/uploads/slider/{{ $slide->urlImg }}">
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Add Navigator -->
        <div class="swiper-button-next d-none d-md-block"></div>
        <div class="swiper-button-prev d-none d-md-block"></div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>
@endif

@if ($products_top->count() > 0)
<section class="top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top__title">
                    <div class="title">Топ продаж</div>
                    <div class="arrows">
                        <div class="arrows__item home-prev">
                            <img src="src/img/prev.svg" alt="prev">
                        </div>
                        <div class="arrows__item home-next">
                            <img src="src/img/next.svg" alt="next">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="swiper-container top-slider">
                    <div class="swiper-wrapper">
                        @foreach ($products_top as $top)
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card__image">
                                    <img src="/img/uploads/products/{{ $top->url_img }}" alt="{{ $top->name }}" width="100%">
                                </div>
                                <div class="card__title">{{ $top->name }}</div>
                                <div class="card__price">{{ $top->price }} руб.</div>
                                <form class="card__btn" action="{{route('cart-add', $top)}}" method="POST">
                                    @csrf
                                    <button>
                                        <span>В корзину</span>
                                        <img src="src/img/cart-btn.svg" alt="cartBtn">
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-12 d-flex flex-row-reverse">
                <a href="{{route('catalog')}}" class="link-page">
                    <span>Перейти в каталог</span>
                    <img src="src/img/arrow-link.svg" alt="Link Arrow">
                </a>
            </div>
        </div>
    </div>
</section>
@endif

@if ($stock_count >= 2)
<section class="stocks">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="stocks__title">
                    <div class="title">Акции</div>
                </div>
            </div>
            @foreach ($stocks as $stock)
                <div class="col-12 col-md-6 stock-start-margin">
                    <img src="/img/uploads/stocks/{{ $stock->url_img }}" alt="{{$stock->title}}" width="100%">
                </div>
            @endforeach
            <div class="col-12 d-flex flex-row-reverse stock-start-margin">
                <a href="{{route('stocks')}}" class="link-page">
                    <span>Смотреть все</span>
                    <img src="src/img/arrow-link.svg" alt="Link Arrow">
                </a>
            </div>
        </div>
    </div>
</section>
@endif

@if ($products->count() > 0)
<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="news__title">
                    <div class="title">Новинки</div>
                    <div class="arrows">
                        <div class="arrows__item news-prev">
                            <img src="src/img/prev.svg" alt="prev1">
                        </div>
                        <div class="arrows__item news-next">
                            <img src="src/img/next.svg" alt="next1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="swiper-container news-slider">
                    <div class="swiper-wrapper">
                        @foreach ($products as $prod)
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card__image">
                                    <img src="/img/uploads/products/{{ $prod->url_img }}" alt="{{ $prod->name }}" width="100%">
                                </div>
                                <div class="card__title">{{ $prod->name }}</div>
                                <div class="card__price">{{ $prod->price }} руб.</div>
                                <form class="card__btn" action="{{route('cart-add', $prod)}}" method="POST">
                                    @csrf
                                    <button>
                                        <span>В корзину</span>
                                        <img src="src/img/cart-btn.svg" alt="cartBtn">
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-12 d-flex flex-row-reverse">
                <a href="{{route('catalog')}}" class="link-page">
                    <span>Перейти в каталог</span>
                    <img src="src/img/arrow-link.svg" alt="Link Arrow">
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<section class="info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">О нас</div>
            </div>
            <div class="col-12">
                <div class="info__image"></div>
                <div class="info__text">
                    Текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus Paекстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.
                </div>
            </div>
            <div class="col-12">
                <div class="info__call">
                    <a href="tel:89194486138">
                        <span>Позвонить</span>
                        <img src="src/img/phone-call.svg" alt="phone">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">Мы на карте</div>
            </div>
        </div>
    </div>
    <div class="map-wrap__map">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aab98dcb3de9e0d98038a4eb0e7bb188394a293e4f116eb0fb27b00c8aaa0d59b&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
    </div>
</section>

@include('layouts.footer')
@include('layouts.scripts')

<script>
    var swiper = new Swiper('.swiper-container.home', {
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true,
    });

    var swiper2 = new Swiper('.swiper-container.top-slider', {
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
            nextEl: '.home-next',
            prevEl: '.home-prev',
        },
        breakpoints: {
            1050: {
            slidesPerView: 3,
            spaceBetween: 20,
            },
            768: {
            slidesPerView: 2,
            spaceBetween: 20,
            },
            520: {
            slidesPerView: 1,
            spaceBetween: 30,
            },
        }
    });

    var swiper3 = new Swiper('.swiper-container.news-slider', {
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
            nextEl: '.news-next',
            prevEl: '.news-prev',
        },
        breakpoints: {
            1050: {
            slidesPerView: 3,
            spaceBetween: 20,
            },
            768: {
            slidesPerView: 2,
            spaceBetween: 20,
            },
            520: {
            slidesPerView: 1,
            spaceBetween: 30,
            },
        }
    });
</script>
@endsection

