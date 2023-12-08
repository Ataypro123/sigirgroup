@extends('layout')

@section('title')
    Руководство
@endsection

@section('content')

    <div class="page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">Руководство</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">Кафедра ФИИТ, КНУ имени Жусупа Баласагына&nbsp;</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">Руководство</h2>
                <div class="section-title-divider"></div>
            </div>
            <div class="featured-courses-list-wrapper w-dyn-list">
                <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                    @foreach($teams as $t)
                        <div class="featured-course-item w-col w-col-12 w-dyn-item">
                            <div class="course-block-wrapper">
                                <div class="course-content-block flex-department-single">
                                    <div class="w-col-4">
                                        <img src='{{asset("files/storage/app/{$t->image}")}}' class="img-department-single">
                                    </div>
                                    <div class="w-col-8">
                                        <a class="course-title-link with-summary">{{$t->name}}</a>
                                        <a class="course-title-link">Должность: {{$t->status}}</a>
                                        <br>
                                        <a href='{{url("files/storage/app/{$t->pdf}")}}' target="_blank" class="pdf-d-s">Резюме</a>
                                        <br>
                                        <div class="block-body-d-s">
                                            {!! htmlspecialchars_decode($t->body) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
