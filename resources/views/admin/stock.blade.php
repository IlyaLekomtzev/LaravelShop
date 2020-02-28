@extends('layouts.app')

@section('title')Управление слайдером@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <a href="{{route('admin')}}">< Назад</a>
                    <span class="admin-card-title">Управление акциями</span>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/stock/upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title-stock">Заголовок акции</label>
                            <input type="text" name="title" class="form-control" id="title-stock" required>
                        </div>
                        <div class="form-group">
                            <label for="descr-stock">Описание</label>
                            <textarea class="form-control" name="descr" id="descr-stock" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image-slider">Изображение акции</label>
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
                    Акции
                </div>

                <div class="card-body row">
                    @foreach ($stocks as $stock)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <img src="/img/uploads/stocks/{{ $stock->url_img }}" width="100%">
                            <h4 class="mt-2">{{ $stock->title }}</h4>
                            <p class="mt-2">{{ $stock->descr }}</p>
                            <form action="{{ url('admin/stock/delete/' . $stock->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection