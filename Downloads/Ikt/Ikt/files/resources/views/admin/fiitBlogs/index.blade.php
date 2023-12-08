@extends('admin.layout')

@section('title')
    Новости ФИИТ
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Новости ФИИТ</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item">Новости ФИИТ</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Новости ФИИТ</h6>
                        <a href="{{route('fiitBlog.create')}}" class="btn btn-info mb-1">Добавить</a>
                    </div>
                    <div class="table-responsive">
                        @if($fiitBlogs->first())
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fiitBlogs as $fb)
                                    <tr>
                                        <td><a href="#">{{$fb->id}}</a></td>
                                        <td>{{$fb->name}}</td>
                                        <td class="edit-del">
                                            <a href="{{route('fiitBlog.edit', $fb->slug)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {!! Form::open(['route' => ['fiitBlog.delete', $fb->slug], 'method' => 'delete']) !!}
                                            <button class="del-bak" type="submit" href="{{route('fiitBlog.delete', $fb->slug)}}">
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
                                Новости ФИИТ не добавлены!
                            </div>
                        @endif
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        {{$fiitBlogs->links()}}
    </div>

@endsection


