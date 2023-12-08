@extends('admin.layout')

@section('title')
    Файлы
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Файлы</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item">Файлы</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Файлы</h6>
                        <a href="{{route('files.create')}}" class="btn btn-info mb-1">Добавить</a>
                    </div>
                    <div class="table-responsive">
                        @if($files->first())
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Категория</th>
                                    <th>Под Категория</th>
                                    <th>Раздел</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $file)
                                    <tr>
                                        <td><a href="#">{{$file->id}}</a></td>
                                        <td>{{Str::limit($file->name, 50)}}</td>
                                        <td>{{$file->category->name??''}}</td>
                                        <td>{{$file->subcategory->name??''}}</td>
                                        <td>
                                            @if($file->type == 0)
                                                Научные проекты
                                            @endif
                                            @if($file->type == 1)
                                                Дипломные работы
                                            @endif
                                            @if($file->type == 2)
                                                Публикации
                                            @endif
                                        </td>
                                        <td class="edit-del">
                                            <a href="{{route('files.edit', $file->id)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {!! Form::open(['route' => ['files.delete', $file->id], 'method' => 'delete']) !!}
                                            <button class="del-bak" type="submit" href="{{route('files.delete', $file->id)}}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-light" role="alert">
                                Файлы не добавлены!
                            </div>
                        @endif
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        {{ $files->links() }}
    </div>

@endsection


