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
                <li class="breadcrumb-item"><a href="{{route('files.index')}}">Файлы</a></li>
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
                        {!! Form::model($id, ['route' => ['files.update', $id->id], 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Название') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if($errors->has('name'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_id', 'Категории') !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                            @if($errors->has('category_id'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="sub_category_id" class="form-label">Под Категория</label>
                            <select class="form-control" id="sub_category_id" name="sub_category_id">
                                @foreach($subCategories as $subCategory)
                                <option value="{{$subCategory->id}}" {{$id->subcategory_id == $subCategory->id ? 'selected' : ''}}>
                                    {{$subCategory->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type" class="form-label">Раздел</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="0" {{$id->type == '0' ? 'selected' : ''}}>Научные проекты</option>
                                <option value="1" {{$id->type == '1' ? 'selected' : ''}}>Дипломные работы</option>
                                <option value="2" {{$id->type == '2' ? 'selected' : ''}}>Публикации</option>
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('url', 'URL ссылка (не обязательно)') !!}
                            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'URL ссылка']) !!}
                        </div>

                        @if($id->file)
                        <div class="form-group">
                            {!! Form::label('file', 'Файл') !!}
                            <div>
                                <a href="{{url("files/storage/app/{$id->file}")}}" target="_blank">Ссылка на прикрепленный файл</a>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <div class="custom-file">
                                {!! Form::label('file', 'Выберите файл (не обязательно)') !!}
                                {!! Form::file('file', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
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
