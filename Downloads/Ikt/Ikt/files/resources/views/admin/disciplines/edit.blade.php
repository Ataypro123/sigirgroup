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
                <li class="breadcrumb-item"><a href="{{route('disciplines.index')}}">Дисциплины</a></li>
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
                        {!! Form::model($id, ['route' => ['disciplines.update', $id->id], 'method' => 'post', 'files' => true]) !!}
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

                            @if($errors->has('sub_category_id'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="term_id" class="form-label">Семестры</label>
                            <select class="form-control" id="term_id" name="term_id">
                                @foreach($terms as $term)
                                    <option value="{{$term->id}}" {{$id->term_id == $term->id ? 'selected' : ''}}>
                                        {{$term->name}}
                                    </option>
                                @endforeach
                            </select>

                            @if($errors->has('term_id'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('code', 'Код') !!}
                            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Код']) !!}
                            @if($errors->has('code'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'Тип Курса') !!}
                            {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Тип Курса']) !!}
                            @if($errors->has('type'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('t', 'T') !!}
                            {!! Form::text('t', null, ['class' => 'form-control', 'placeholder' => 'T']) !!}
                            @if($errors->has('t'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('u', 'U') !!}
                            {!! Form::text('u', null, ['class' => 'form-control', 'placeholder' => 'U']) !!}
                            @if($errors->has('u'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('k', 'K') !!}
                            {!! Form::text('k', null, ['class' => 'form-control', 'placeholder' => 'K']) !!}
                            @if($errors->has('k'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('ects', 'ECTS') !!}
                            {!! Form::text('ects', null, ['class' => 'form-control', 'placeholder' => 'ECTS']) !!}
                            @if($errors->has('ects'))
                                <span class="text-danger">Это поле обьязательно!</span>
                            @endif
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
                                {!! Form::label('file', 'Выберите файл') !!}
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

        $(document).ready(function(){
            $('select[name="sub_category_id"]').on('change', function (){
                var subcategory_id = $(this).val();
                if(subcategory_id){
                    $.ajax({
                        url: "{{url('/admin/files/disciplines/ajax')}}/"+subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data){
                            $('select[name="term_id"]').html('');
                            var d = $('select[name="term_id"]').empty();
                            $.each(data, function (key, value){
                                $('select[name="term_id"]').append('<option value="' +value.id+ '">' + value.name + '</option>');
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
