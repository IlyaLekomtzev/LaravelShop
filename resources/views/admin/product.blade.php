@extends('layouts.app')

@section('title')Управление слайдером@endsection

@section('content')
<div class="container-fluid" style="overflow:hidden">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <a href="{{route('admin')}}">< Назад</a>
                    <span class="admin-card-title">Управление товарами</span>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/product/upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name-prod">Наименование товара</label>
                            <input type="text" name="name" class="form-control" id="name-prod" required>
                        </div>
                        <div class="form-group">
                            <label for="cat-prod">Категория</label>
                            <select name="category" class="form-control" id="cat-prod">
                                @foreach ($categories as $cat)
                                    <option>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="season-prod">Сезон</label>
                            <select name="season" class="form-control" id="season-prod">
                                <option>Зима</option>
                                <option>Весна</option>
                                <option>Лето</option>
                                <option>Осень</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sizes-prod">Размеры (через запятую)</label>
                            <input type="text" name="sizes" class="form-control" id="sizes-prod" required>
                        </div>
                        <div class="form-group">
                            <label for="colors-prod">Цвета (через запятую)</label>
                            <input type="text" name="colors" class="form-control" id="colors-prod" required>
                        </div>
                        <div class="form-group">
                            <label for="price-prod">Цена товара</label>
                            <input type="number" name="price" class="form-control" id="price-prod" required>
                        </div>
                        <div class="form-group">
                            <label for="image-slider">Изображение товара</label>
                            <input type="file" name="image" class="form-control-file" id="image-slider">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Загрузить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    Товары
                </div>

                <div class="card-body row">
                    @foreach ($products as $prod)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <img src="/img/uploads/products/{{ $prod->url_img }}" width="100%">
                            <h4 class="mt-2">{{ $prod->name }}</h4>
                            <h5 class="mt-2">Артикул: {{ $prod->articul }}</h5>
                            <h5 class="mt-2">Размеры: {{ $prod->sizes }}</h5>
                            <h5 class="mt-2">Цвета: {{ $prod->colors }}</h5>
                            <h5 class="mt-2">Сезон: {{ $prod->season }}</h5>
                            <h4 class="mt-2">{{ $prod->price }} руб.</h4>
                            <p class="mt-2">{{ $prod->category }}</p>
                            @if ($prod->top == '0')
                                <h5 style="color:darkred">Не в топе</h5>
                            @else
                                <h5 style="color:chartreuse">В топе</h5>
                            @endif
                            <div class="d-flex">
                                <form action="{{ url('admin/product/delete/' . $prod->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                                @if ($prod->top == '0')
                                    <form action="{{ url('admin/product/update/top_on/' . $prod->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success ml-2" type="submit">В топ</button>
                                    </form>
                                @else
                                    <form action="{{ url('admin/product/update/top_off/' . $prod->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-dark ml-2" type="submit">Убрать топ</button>
                                    </form>
                                @endif
                            </div>
                            <a href="{{ route('prod-edit', $prod->id) }}" class="btn btn-info mt-3">Редактировать</a>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
