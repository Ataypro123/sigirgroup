@extends('admin.layout')

@section('title')
    {{$team->name}}
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$team->name}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('team.index')}}">Состав кафедры</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$team->name}}</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{$team->name}}</h6>
                    </div>
                    <div class="card-body">
                        {!! Form::model($team, ['route' => ['team.update', $team->slug], 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'ФИО') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if($errors->has('name'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Должность') !!}
                            {!! Form::text('status', null, ['class' => 'form-control']) !!}
                            @if($errors->has('status'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('body', 'Информация о преподе') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                            @if($errors->has('body'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Изображение') !!}
                            <div>
                                <img src='{{asset("files/storage/app/{$team->image}")}}' class="img-thumbnail img-fluid" alt="Responsive image" width="20%">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="custom-file">
                                {!! Form::label('image', 'Изображение') !!}
                                {!! Form::file('image', ['class' => 'form-control']) !!}
                                @if($errors->has('image'))
                                    <span class="text-danger">Это поле обьязательно!</span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('pdf', 'Резюме') !!}
                            <div>
                                <iframe src='{{asset("files/storage/app/{$team->pdf}")}}'>
                                    Ваш браузер не поддерживает фреймы
                                </iframe>
                                <br>
                                <a target="_blank" href='{{url("files/storage/app/{$team->pdf}")}}'>Резюме</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                {!! Form::label('pdf', 'Выберите файл (резюме только в pdf формате)') !!}
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
