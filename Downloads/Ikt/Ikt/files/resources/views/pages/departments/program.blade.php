@extends('layout')

@section('title')
    {{$department->name}}
@endsection

@section('content')

    <div class="featured-courses page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">{{$department->name}}</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">ФИИТ</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">{{$department->name}}</h2>
                <div class="section-title-divider"></div>
            </div>
            <div class="featured-courses-list-wrapper w-dyn-list">
                <div class="featured-courses-list-wrapper w-dyn-list">
                    <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                        <div class="featured-course-item w-col w-col-12 w-dyn-item">
                            <div class="course-block-wrapper">
                                <div class="course-content-block flex-department-single">
                                    <div class="w-col-12">
                                        <a class="course-title-link with-summary">ООП</a>
                                        <br>
                                        @foreach($department->program as $p)
                                        <div class="w-col w-col-4 program-block">
                                            <a class="course-title-link" href='{{url("files/storage/app/{$p->pdf}")}}' target="_blank">
                                                {{$p->name}}
                                            </a>
                                            <a href='{{url("files/storage/app/{$p->pdf}")}}' target="_blank" class="pdf-d-s">Скачать</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
