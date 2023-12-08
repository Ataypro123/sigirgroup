@extends('layout')

@section('title')
    {{$chart->name}}
@endsection

@section('content')

    <div class="featured-courses page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">{{$chart->name}}</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">ФИИТ</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">Расписание</h2>
                <div class="section-title-divider"></div>
            </div>
            <div class="featured-courses-list-wrapper w-dyn-list">
                <div class="featured-courses-list-wrapper w-dyn-list">
                    <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                        @foreach($chart->chartContent as $cc)
                            <div class="featured-course-item w-col w-col-6 w-dyn-item">
                                <div class="course-block-wrapper">
                                    <div class="course-content-block flex-department-single">
                                        <div class="w-col-12">
                                        <a class="course-title-link with-summary" href="{{route('pages.department.chartMaterial', [$chart->slug, $cc->id])}}">
                                            {{$cc->name}}
                                        </a>
                                        @foreach($cc->chartMaterial as $cm)
                                            <div class="w-col w-col-6">
                                                <a class="course-title-link">Группа: {{$cm->name}}</a>
                                                <a href='{{url("files/storage/app/{$cm->pdf}")}}' target="_blank" class="pdf-d-s">Скачать</a>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
