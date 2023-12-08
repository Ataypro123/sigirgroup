@extends('layout')

@section('title')
    Факультет
@endsection

@section('content')

    <div class="course page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">Факультет</h1>
                <h2 class="category page-subtitle" data-ix="fade-in-on-load-2">ФИИТ</h2>
            </div>
        </div>
    </div>

    <div class="section tint">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">Выберите раздел</h2>
                <div class="section-title-divider"></div>
            </div>
            <div class="featured-courses-list-wrapper w-dyn-list">
                <div class="featured-courses-list w-clearfix w-dyn-items w-row">

                    <div class="featured-course-item w-col w-col-6 w-dyn-item">
                        <div class="course-block-wrapper">
                            <a class="course-image-link-block large w-inline-block" href="{{route('pages.department.guide')}}" style="background-image: url('/images/business.jpg');">
                            </a>
                            <div class="course-content-block">
                                <a class="course-title-link with-summary" href="{{route('pages.department.guide')}}">Руководство</a>
                            </div>
                        </div>
                    </div>

                    <div class="featured-course-item w-col w-col-6 w-dyn-item">
                        <div class="course-block-wrapper">
                            <a class="course-image-link-block large w-inline-block" href="{{route('pages.department.process')}}" style="background-image: url('/images/teacher.jpg');">
                            </a>
                            <div class="course-content-block">
                                <a class="course-title-link with-summary" href="{{route('pages.department.process')}}">Учебный процесс</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
