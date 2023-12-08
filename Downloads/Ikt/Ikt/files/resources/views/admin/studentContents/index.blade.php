@extends('admin.layout')

@section('title')
    Студенты (материал)
@endsection

@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Студенты (материал)</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                <li class="breadcrumb-item">Студенты (материал)</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Студенты (материал)</h6>
                        <a href="{{route('studentContent.create')}}" class="btn btn-info mb-1">Добавить</a>
                    </div>
                    <div class="table-responsive">
                        @if($mStudentContents->first())
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Молодежный комитет</th>
                                    <th>Категория</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mStudentContents as $sc)
                                    <tr>
                                        <td><a href="#">{{$sc->id}}</a></td>
                                        <td>{{$sc->name}}</td>
                                        <td>{{$sc->student->name}}</td>
                                        <td class="edit-del">
                                            <a href="{{route('studentContent.edit', $sc->slug)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {!! Form::open(['route' => ['studentContent.delete', $sc->slug], 'method' => 'delete']) !!}
                                            <button class="del-bak" type="submit" href="{{route('studentContent.delete', $sc->slug)}}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        {{ $mStudentContents->links() }}
                    </div>
                    <div class="table-responsive">
                        @if($aStudentContents->first())
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Активисты и Отличники</th>
                                    <th>Статус</th>
                                    <th>Категория</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($aStudentContents as $sc)
                                    <tr>
                                        <td><a href="#">{{$sc->id}}</a></td>
                                        <td>{{$sc->name}}</td>
                                        <td>{{$sc->role}}</td>
                                        <td>{{$sc->student->name}}</td>
                                        <td class="edit-del">
                                            <a href="{{route('studentContent.edit', $sc->slug)}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {!! Form::open(['route' => ['studentContent.delete', $sc->slug], 'method' => 'delete']) !!}
                                            <button class="del-bak" type="submit" href="{{route('studentContent.delete', $sc->slug)}}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $aStudentContents->links() }}
                        @endif
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>

@endsection


