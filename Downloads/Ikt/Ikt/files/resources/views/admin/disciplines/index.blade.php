@extends('admin.layout')

@section('title')
    Дисциплины
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Дисциплины</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item">Дисциплины</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Дисциплины</h6>
                        <a href="{{route('disciplines.create')}}" class="btn btn-info mb-1">Добавить</a>
                    </div>
                    <div class="table-responsive">
                        @if($disciplines->first())
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Категория</th>
                                    <th>Под Категория</th>
                                    <th>Семестр</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($disciplines as $discipline)
                                    <tr>
                                        <td><a href="#">{{$discipline->id}}</a></td>
                                        <td>{{Str::limit($discipline->name, 50)}}</td>
                                        <td>{{$discipline->category->name??''}}</td>
                                        <td>{{$discipline->subcategory->name??''}}</td>
                                        <td>{{$discipline->term->name??''}}</td>
                                        <td class="edit-del">
                                            <a href="{{route('disciplines.edit', $discipline->id)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {!! Form::open(['route' => ['disciplines.delete', $discipline->id], 'method' => 'delete']) !!}
                                            <button class="del-bak" type="submit" href="{{route('disciplines.delete', $discipline->id)}}">
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
                                Дисциплины не добавлены!
                            </div>
                        @endif
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        {{ $disciplines->links() }}
    </div>

@endsection


