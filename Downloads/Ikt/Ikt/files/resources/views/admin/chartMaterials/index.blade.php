@extends('admin.layout')

@section('title')
    Расписание
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Расписание</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item">Расписание</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Расписание</h6>
                        <a href="{{route('chartMaterial.create')}}" class="btn btn-info mb-1">Добавить</a>
                    </div>
                    <div class="table-responsive">
                        @if($chartMaterials->first())
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Категория (учебный процесс)</th>
                                    <th>Курс</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chartMaterials as $cm)
                                    <tr>
                                        <td><a href="#">{{$cm->id}}</a></td>
                                        <td>{{$cm->name}}</td>
                                        <td>{{$cm->chartContent->chart->name}}</td>
                                        <td>{{$cm->chartContent->name}}</td>
                                        <td class="edit-del">
                                            <a href="{{route('chartMaterial.edit', $cm->id)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {!! Form::open(['route' => ['chartMaterial.delete', $cm->id], 'method' => 'delete']) !!}
                                            <button class="del-bak" type="submit" href="{{route('chartMaterial.delete', $cm->id)}}">
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
                                Расписание не добавлены!
                            </div>
                        @endif
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        {{ $chartMaterials->links() }}
    </div>

@endsection


