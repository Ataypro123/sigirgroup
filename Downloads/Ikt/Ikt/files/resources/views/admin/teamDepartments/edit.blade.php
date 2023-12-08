@extends('admin.layout')

@section('title')
    {{$teamDepartment->name}}
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$teamDepartment->name}}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('teamDepartment.index')}}">Сотрудники</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$teamDepartment->name}}</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{$teamDepartment->name}}</h6>
                    </div>
                    <div class="card-body">
                        {!! Form::model($teamDepartment, ['route' => ['teamDepartment.update', $teamDepartment->slug], 'method' => 'post', 'files' => true]) !!}
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
                            {!! Form::label('category_id', 'Уч программа') !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                            @if($errors->has('category_id'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sub_category_id" class="form-label">Под Категория</label>
                            <select class="form-control" id="sub_category_id" name="sub_category_id">
                                @foreach($subCategories as $subCategory)
                                    <option value="{{$subCategory->id}}" {{$teamDepartment->subcategory_id == $subCategory->id ? 'selected' : ''}}>
                                        {{$subCategory->name}}
                                    </option>
                                @endforeach
                            </select>
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
                                <img src='{{asset("files/storage/app/{$teamDepartment->image}")}}' class="img-thumbnail img-fluid" alt="Responsive image" width="20%">
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
                        @if($teamDepartment->pdf)
                        <div class="form-group">
                            {!! Form::label('pdf', 'Резюме') !!}
                            <div>
                                <iframe src='{{asset("files/storage/app/{$teamDepartment->pdf}")}}'>
                                    Ваш браузер не поддерживает фреймы
                                </iframe>
                                <br>
                                <a target="_blank" href='{{url("files/storage/app/{$teamDepartment->pdf}")}}'>Резюме</a>
                            </div>
                        </div>
                        @endif
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="category_id"]').on('change', function (){
                var category_id = $(this).val();
                if(category_id){
                    $.ajax({
                        url: "{{url('/admin/files/ajax')}}/"+category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data){
                            $('select[name="sub_category_id"]').html('');
                            var d = $('select[name="sub_category_id"]').empty();
                            $.each(data, function (key, value){
                                $('select[name="sub_category_id"]').append('<option value="' +value.id+ '">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
