@extends('layouts.app')

@section('title')Редактирование товара {{$product->name}}@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <a href="{{route('product')}}">< Назад</a>
                    <span class="admin-card-title">Редактирование товара арт.{{$product->articul}}</span>
                </div>

                <div class="card-body">
                    <form action="{{route('prod-edit-save', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name-prod">Наименование товара</label>
                            <input type="text" name="name" class="form-control" id="name-prod" value="{{$product->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="cat-prod">Категория</label>
                            <select name="category" class="form-control" id="cat-prod" required>
                                <option>{{$product->category}}</option>
                                @foreach ($categories as $cat)
                                    <option>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="season-prod">Сезон</label>
                            <select name="season" class="form-control" id="season-prod" required>
                                <option>{{$product->season}}</option>
                                <option>Зима</option>
                                <option>Весна</option>
                                <option>Лето</option>
                                <option>Осень</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sizes-prod">Размеры (через запятую)</label>
                            <input type="text" name="sizes" class="form-control" id="sizes-prod" value="{{$product->sizes}}" required>
                        </div>
                        <div class="form-group">
                            <label for="colors-prod">Цвета (через запятую)</label>
                            <input type="text" name="colors" class="form-control" id="colors-prod" value="{{$product->colors}}" required>
                        </div>
                        <div class="form-group">
                            <label for="price-prod">Цена товара</label>
                            <input type="number" name="price" class="form-control" id="price-prod" value="{{$product->price}}" required>
                        </div>
                        <div class="form-group">
                            <label for="image-slider">Изображение товара</label>
                            <input type="file" name="image" class="form-control-file" id="image-slider">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
