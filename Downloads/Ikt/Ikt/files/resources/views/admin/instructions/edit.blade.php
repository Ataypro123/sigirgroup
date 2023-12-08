@extends('admin.layout')

@section('title')
    {{$instruction->name}}
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$instruction->name}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('instruction.index')}}">Инструкция</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$instruction->name}}</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{$instruction->name}}</h6>
                    </div>
                    <div class="card-body">
                        {!! Form::model($instruction, ['route' => ['instruction.update', $instruction->slug], 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Название Инструкции') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if($errors->has('name'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('url', 'Ссылка (url адрес)') !!}
                            {!! Form::text('url', null, ['class' => 'form-control']) !!}
                        </div>
                        <br>
                        @if($instruction->video)
                        <div class="form-group">
                            {!! Form::label('video', 'Файл') !!}
                            <div>
                                <iframe width="560" height="315" src='{{asset("files/storage/app/{$instruction->video}")}}' allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <div class="custom-file">
                                {!! Form::label('video', 'Выберите файл') !!}
                                {!! Form::file('video', ['class' => 'form-control']) !!}
                                @if($errors->has('video'))
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
