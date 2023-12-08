@extends('admin.layout')

@section('title')
    {{$subMenu->name}}
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$subMenu->name}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('subMenu.index')}}">Под меню (Факультет)</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$subMenu->name}}</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{$subMenu->name}}</h6>
                    </div>
                    <div class="card-body">
                        {!! Form::model($subMenu, ['route' => ['subMenu.update', $subMenu->slug], 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Название под меню (Факультет)') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if($errors->has('name'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('body', 'Соддержание под меню') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                            @if($errors->has('body'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        @if($subMenu->image)
                        <div class="form-group">
                            {!! Form::label('image', 'Изображение') !!}
                            <div>
                                <img src='{{asset("files/storage/app/{$subMenu->image}")}}' class="img-thumbnail img-fluid" alt="Responsive image" width="20%">
                            </div>
                        </div>
                        <br>
                        @endif
                        <div class="form-group">
                            <div class="custom-file">
                                {!! Form::label('image', 'Выберит изображение, если это необходимо') !!}
                                {!! Form::file('image', ['class' => 'form-control']) !!}
                                @if($errors->has('image'))
                                    <span class="text-danger">Это поле обьязательно!</span>
                                @endif
                            </div>
                        </div>
                        <br>
                        @if($subMenu->pdf)
                        <div class="form-group">
                            {!! Form::label('pdf', 'pdf файл') !!}
                            <div>
                                <iframe src='{{asset("files/storage/app/{$subMenu->pdf}")}}'>
                                    Ваш браузер не поддерживает фреймы
                                </iframe>
                                <br>
                                <a target="_blank" href='{{url("files/storage/app/{$subMenu->pdf}")}}'>pdf файл</a>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <div class="custom-file">
                                {!! Form::label('pdf', 'Выберите файл, если это необходимо (только в pdf формате)') !!}
                                {!! Form::file('pdf', ['class' => 'form-control']) !!}
                                @if($errors->has('pdf'))
                                    <span class="text-danger">Это поле обьязательно!</span>
                                @endif
                            </div>
                        </div>
                        <br>
                        {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'body' );
    </script>
@endsection
