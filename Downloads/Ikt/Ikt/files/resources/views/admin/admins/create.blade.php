@extends('admin.layout')

@section('title')
    Добавление нового администратора
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавление нового администратора</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('administrator.index')}}">Администраторы</a></li>
                <li class="breadcrumb-item active" aria-current="page">Добавление нового администратора</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Добавление нового администратора</h6>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'administrator.store', 'method' => 'put', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'ФИО администратора') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ФИО администратора']) !!}
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email администратора') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email администратора']) !!}
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('role', 'Статус работника') !!}
                            {!! Form::select('role', ['0' => 'Администратор', '1' => 'Менеджер'], null, ['class' => 'form-control']) !!}
                            @if($errors->has('role'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Пароль администратора') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Повтор пароля администратора') !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        </div>
                        <br>
                        <hr>
                        {!! Form::reset('Очистить', ['class' => 'btn btn-primary']) !!}
                        {!! Form::submit('Добавить', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
