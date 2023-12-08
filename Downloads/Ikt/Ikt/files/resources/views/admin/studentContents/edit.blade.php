@extends('admin.layout')

@section('title')
    {{$studentContent->name}}
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$studentContent->name}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('studentContent.index')}}">Студенты (материал)</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$studentContent->name}}</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{$studentContent->name}}</h6>
                    </div>
                    <div class="card-body">
                        {!! Form::model($studentContent, ['route' => ['studentContent.update', $studentContent->slug], 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            <input name="role" type="hidden" class="form-control" value="{{$studentContent->role}}">
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Название') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if($errors->has('name'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('student_id', 'Категории') !!}
                            {!! Form::select('student_id', $students, null, ['class' => 'form-control']) !!}
                            @if($errors->has('student_id'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        @if($studentContent->status)
                        <div class="form-group">
                            {!! Form::label('status', 'Должность студента') !!}
                            {!! Form::text('status', null, ['class' => 'form-control']) !!}
                            @if($errors->has('status'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        @endif
                        @if($studentContent->course)
                        <div class="form-group">
                            {!! Form::label('course', 'Какой курс') !!}
                            {!! Form::text('course', null, ['class' => 'form-control']) !!}
                            @if($errors->has('course'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        @endif
                        @if($studentContent->body)
                            <div class="form-group">
                                {!! Form::label('body', 'Описание') !!}
                                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                                @if($errors->has('body'))
                                    <span class="text-danger">Это поле обьязательно!</span>
                                @endif
                            </div>
                        @endif
                        @if($studentContent->image)
                            <div class="form-group">
                                {!! Form::label('image', 'Изображение') !!}
                                <div>
                                    <img src='{{asset("files/storage/app/{$studentContent->image}")}}' class="img-thumbnail img-fluid" alt="Responsive image" width="20%">
                                </div>
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
                        @endif
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
