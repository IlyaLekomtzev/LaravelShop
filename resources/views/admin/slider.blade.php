@extends('layouts.app')

@section('title')Управление слайдером@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <a href="{{route('admin')}}">< Назад</a>
                    <span class="admin-card-title">Управление слайдером на главной странице</span>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/slider/upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="link-slider">Ссылка для слайда</label>
                            <input type="text" name="link" class="form-control" id="link-slider" required>
                        </div>
                        <div class="form-group">
                            <label for="image-slider">Изображение слайда</label>
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
                    Слайдеры
                </div>

                <div class="card-body">
                    @foreach ($slides as $slide)
                        <div class="wrap mb-5">
                            <img src="/img/uploads/slider/{{ $slide->urlImg }}" width="100%">
                            <h5 class="mt-2">Ссылка: <a href="{{ $slide->link }}">{{ $slide->link }}</a></h5>
                            <form action="{{ url('admin/slider/delete/' . $slide->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
