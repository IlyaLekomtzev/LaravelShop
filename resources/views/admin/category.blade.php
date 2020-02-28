@extends('layouts.app')

@section('title')Управление категориями@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <a href="{{route('admin')}}">< Назад</a>
                    <span class="admin-card-title">Управление категориями товаров</span>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/category/upload')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name-cat">Имя категории</label>
                            <input type="text" name="name" class="form-control" id="name-cat" required>
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
                    Категории
                </div>

                <div class="card-body">
                    @foreach ($categories as $cat)
                        <div class="wrap cat-wrap mb-2">
                            <h5>{{ $cat->name }}</h5>
                            <a href="{{ route('category-edit', $cat->id) }}" class="btn btn-info">Редактировать</a>
                            <form action="{{ url('admin/category/delete/' . $cat->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
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
