@extends('admin.layout')

@section('title')
    {{$id->name}}
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$id->name}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('programs.index')}}">Основная образовательная программа</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$id->name}}</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{$id->name}}</h6>
                    </div>
                    <div class="card-body">
                        {!! Form::model($id, ['route' => ['programs.update', $id->id], 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Название файла') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Название файла']) !!}
                            @if($errors->has('name'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('department_id', 'Кафедра') !!}
                            {!! Form::select('department_id', $departments, null, ['class' => 'form-control']) !!}
                            @if($errors->has('department_id'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::label('pdf', 'Файл') !!}
                            <div>
                                <iframe src='{{asset("files/storage/app/{$id->pdf}")}}'>
                                    Ваш браузер не поддерживает фреймы
                                </iframe>
                                <br>
                                <a target="_blank" href='{{url("files/storage/app/{$id->pdf}")}}'>Файл</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                {!! Form::label('pdf', 'Выберите файл (только в pdf формате)') !!}
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
