@extends('admin.layout')

@section('title')
    {{$department->name}}
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$department->name}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('department.index')}}">Кафедры</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$department->name}}</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{$department->name}}</h6>
                    </div>
                    <div class="card-body">
                        {!! Form::model($department, ['route' => ['department.update', $department->slug], 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Название Кафедры') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if($errors->has('name'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('body', 'Описание Кафедры') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                            @if($errors->has('body'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Изображение') !!}
                            <div>
                                <img src='{{asset("files/storage/app/{$department->image}")}}' class="img-thumbnail img-fluid" alt="Responsive image" width="20%">
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
                        <br>
                        <div class="form-group">
                            <div class="custom-file">
                                <label for="uploads">Добавить несколько изображений</label>
                                <input type="file" name="uploads[]" multiple class="form-control" id="uploads">
                            </div>
                        </div>
                        <br>
                        {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                        <br>
                        <div class="form-group">
                            <label for="uploads">Изображения</label>
                            <div class="row justify-content-start">
                                @foreach($department->departmentUpload as $du)
                                    <div class="col-sm-2">
                                        <img src='{{asset("files/storage/app/{$du->uploads}")}}' class="img-thumbnail img-fluid" alt="Responsive image">
                                        {!! Form::open(['route' => ['departmentUpload.delete', $du->id], 'method' => 'delete']) !!}
                                        <button class="del-bak" type="submit" href="{{route('departmentUpload.delete', $du->id)}}">
                                            Удалить
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <br>
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
