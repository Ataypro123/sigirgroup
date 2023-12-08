@extends('admin.layout')

@section('title')
    Сотрудники
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Сотрудники</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item">Сотрудники</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Сотрудники</h6>
                        <a href="{{route('teamDepartment.create')}}" class="btn btn-info mb-1">Добавить</a>
                    </div>
                    <div class="table-responsive">
                        @if($teamDepartments->first())
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>ФИО</th>
                                    <th>Уч программа</th>
                                    <th>Должность</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teamDepartments as $d)
                                    <tr>
                                        <td><a href="#">{{$d->id}}</a></td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->category->name??''}}</td>
                                        <td>{{$d->status}}</td>
                                        <td class="edit-del">
                                            <a href="{{route('teamDepartment.edit', $d->slug)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {!! Form::open(['route' => ['teamDepartment.delete', $d->slug], 'method' => 'delete']) !!}
                                            <button class="del-bak" type="submit" href="{{route('teamDepartment.delete', $d->slug)}}">
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
                                Сотрудники не добавлены!
                            </div>
                        @endif
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        {{$teamDepartments->links()}}
    </div>

@endsection


