@extends('admin.layout')

@section('title')
    Добавление нового материала
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавление нового материала</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('studentContent.index')}}">Студенты (материал)</a></li>
                <li class="breadcrumb-item active" aria-current="page">Добавление нового материала</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Добавление нового материала</h6>
                    </div>
                    <br>
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Добавить материал для категории (молодежный комитет)
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    {!! Form::open(['route' => 'studentContent.store', 'method' => 'put', 'files' => true]) !!}
                                    <div class="form-group">
                                        <input name="role" type="hidden" class="form-control" value="Молодежный комитет">
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('name', 'ФИО студента') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ФИО студента']) !!}
                                        @if($errors->has('name'))
                                            <span class="text-danger">Это поле обьязательно!</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('student_id', 'Категории') !!}
                                        {!! Form::select('student_id', $students, null, ['class' => 'form-control', 'placeholder' => 'Выберите пункт']) !!}
                                        @if($errors->has('student_id'))
                                            <span class="text-danger">Это поле обьязательно!</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('status', 'Должность студента') !!}
                                        {!! Form::text('status', null, ['class' => 'form-control', 'placeholder' => 'Должность студента']) !!}
                                        @if($errors->has('status'))
                                            <span class="text-danger">Это поле обьязательно!</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('course', 'Какой курс') !!}
                                        {!! Form::text('course', null, ['class' => 'form-control', 'placeholder' => '1, 2, 3 ...']) !!}
                                        @if($errors->has('course'))
                                            <span class="text-danger">Это поле обьязательно!</span>
                                        @endif
                                    </div>
                                    <br>
                                    <hr>
                                    {!! Form::reset('Очистить', ['class' => 'btn btn-primary']) !!}
                                    {!! Form::submit('Добавить', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Добавить материал для категории (Активисты и отличиники) - Активиста
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    {!! Form::open(['route' => 'studentContent.store2', 'method' => 'put', 'files' => true]) !!}
                                    <div class="form-group">
                                        <input name="role" type="hidden" class="form-control" value="Активист">
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('name', 'ФИО студента (Активиста)') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ФИО студента (Активиста)']) !!}
                                        @if($errors->has('name'))
                                            <span class="text-danger">Это поле обьязательно!</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('student_id', 'Категории') !!}
                                        {!! Form::select('student_id', $students, null, ['class' => 'form-control', 'placeholder' => 'Выберите пункт']) !!}
                                        @if($errors->has('student_id'))
                                            <span class="text-danger">Это поле обьязательно!</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('body', 'Описание') !!}
                                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                                        @if($errors->has('body'))
                                            <span class="text-danger">Это поле обьязательно!</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            {!! Form::label('image', 'Выберите файл') !!}
                                            {!! Form::file('image', ['class' => 'form-control']) !!}
                                            @if($errors->has('image'))
                                                <span class="text-danger">Это поле обьязательно!</span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    {!! Form::reset('Очистить', ['class' => 'btn btn-primary']) !!}
                                    {!! Form::submit('Добавить', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Добавить материал для категории (Активисты и отличиники) - Отличиника
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    {!! Form::open(['route' => 'studentContent.store3', 'method' => 'put', 'files' => true]) !!}
                                    <div class="form-group">
                                        <input name="role" type="hidden" class="form-control" value="Отличники">
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('name', 'Какой курс') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '1 курс']) !!}
                                        @if($errors->has('name'))
                                            <span class="text-danger">Это поле обьязательно!</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('student_id', 'Категории') !!}
                                        {!! Form::select('student_id', $students, null, ['class' => 'form-control', 'placeholder' => 'Выберите пункт']) !!}
                                        @if($errors->has('student_id'))
                                            <span class="text-danger">Это поле обьязательно!</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('body', 'Описание') !!}
                                        {!! Form::textarea('body', null, ['class' => 'form-control', 'id'=>'body2']) !!}
                                        @if($errors->has('body'))
                                            <span class="text-danger">Это поле обьязательно!</span>
                                        @endif
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
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'body' );
    </script>
    <script>
        CKEDITOR.replace( 'body2' );
    </script>
@endsection
