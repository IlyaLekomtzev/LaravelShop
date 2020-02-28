@extends('layouts.header')

@section('title')
    <title>WearMeShell | Акции</title>
@endsection

@section('content')

<section class="stocks-top">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="title">Акции</div>
            </div>
        </div>
    </div>
</section>

<section class="stocks-page">
    <div class="container">
        <div class="row">
            @if ($stocks_count > 0)
                @foreach ($stocks as $stock)
                <div class="col-12 col-md-6">
                    <div class="stocks-page__item">
                        <img src="/img/uploads/stocks/{{ $stock->url_img }}" alt="{{ $stock->name }}" width="100%">
                        <div class="stocks-page__item--title">{{ $stock->title }}</div>
                        <div class="stocks-page__item--descr">
                            <p>{{ $stock->descr }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 d-flex justify-content-center">
                    <h3>Сейчас акций нет! Заходите позже)</h3>
                </div>
            @endif
        </div>
    </div>
</section>

<section class="catalog-pagination">
    <div class="container">
        <div class="row">
            <div class="col-12">{{$stocks->links()}}</div>
        </div>
    </div>
</section>

@include('layouts.scripts')

@endsection
