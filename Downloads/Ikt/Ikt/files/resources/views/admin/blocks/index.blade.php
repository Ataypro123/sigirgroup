@extends('admin.layout')

@section('title')
    3 блока в шапке (кол-во кафедры, студентов, преподов)
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">3 блока в шапке</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item">3 блока в шапке</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">3 блока в шапке</h6>
                        <a href="{{route('block.create')}}" class="btn btn-info mb-1">Добавить</a>
                    </div>
                    <div class="table-responsive">
                        @if($blocks->first())
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>URL</th>
                                    <th>Кол-во</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blocks as $b)
                                    <tr>
                                        <td><a href="#">{{$b->id}}</a></td>
                                        <td>{{$b->name}}</td>
                                        <td>{{$b->url}}</td>
                                        <td>{{$b->number}}</td>
                                        <td class="edit-del">
                                            <a href="{{route('block.edit', $b->slug)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {!! Form::open(['route' => ['block.delete', $b->slug], 'method' => 'delete']) !!}
                                            <button class="del-bak" type="submit" href="{{route('block.delete', $b->slug)}}">
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
                                3 блока в шапке не добавлены!
                            </div>
                        @endif
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        {{$blocks->links()}}
    </div>

@endsection


