@extends('layouts.app')

@section('title')Редактирование категории {{$category->name}}@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <a href="{{route('category')}}">< Назад</a>
                    <span class="admin-card-title">Управление категориями товаров</span>
                </div>

                <div class="card-body">
                    <form action="{{route('category-edit-save', $category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name-cat">Имя категории</label>
                            <input type="text" name="nameEdit" class="form-control" id="name-cat" value="{{$category->name}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection