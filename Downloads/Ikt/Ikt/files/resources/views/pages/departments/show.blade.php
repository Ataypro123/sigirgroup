@extends('layout')

@section('title')
    {{$department->name}}
@endsection

@section('content')

    <div class="page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">{{$department->name}}</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">Кафедра ФИИТ, КНУ имени Жусупа Баласагына&nbsp;</h2>
            </div>
        </div>
    </div>

    <div class="section tint">
        <div class="container w-container">
            <div class="w-row">
                <div class="about-us-col-left w-col w-col-12">
                    <div class="section-title-wrapper">
                        <h2 class="section-title">{{$department->name}}</h2>
                        <h2 class="section-title subtitle">
                            КНУ имени Жусупа Баласагына, ФИИТ
                        </h2>
                        <div class="section-title-divider"></div>
                    </div>
                </div>
            </div>
            <br>
            <div class="w-row">
                <div class="about-us-col-left w-col w-col-6">
                    <div class="about-us-image-block" style="background:none;">
                        <div>
                            <div class="fotorama" data-nav="thumbs" data-allowfullscreen="true">
                                <img src='{{asset("files/storage/app/{$department->image}")}}' class="img-fluid">
                                @foreach($department->departmentUpload as $img)
                                    <img src='{{asset("files/storage/app/{$img->uploads}")}}' class="img-fluid">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section tint">
        <div class="container w-container">
            <div class="w-row">
                <div class="container w-container">
                    <p>{!! htmlspecialchars_decode($department->body) !!}</p>
                </div>
            </div>
        </div>
    </div>

    @if($department->teamDepartment->first())
    <div class="section">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">Состав кафедры</h2>
                <div class="section-title-divider"></div>
            </div>
            <div class="featured-courses-list-wrapper w-dyn-list">
                <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                    @foreach($department->teamDepartment as $td)
                    <div class="featured-course-item w-col w-col-12 w-dyn-item">
                        <div class="course-block-wrapper">
                            <div class="course-content-block flex-department-single">
                                <div class="w-col-4">
                                    <img src='{{asset("files/storage/app/{$td->image}")}}' class="img-department-single">
                                </div>
                                <div class="w-col-8">
                                    <a class="course-title-link with-summary">{{$td->name}}</a>
                                    <a href='{{url("files/storage/app/{$td->pdf}")}}' target="_blank" class="pdf-d-s">Резюме</a>
                                    <br>
                                    <div class="block-body-d-s">
                                        {!! htmlspecialchars_decode($td->body) !!}
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
    @endif

    <div class="section tint">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">Кафедры</h2>
                <div class="section-title-divider"></div>
            </div>
            <div class="w-dyn-list">
                <div class="w-clearfix w-dyn-items w-row">
                    @foreach($departments as $d)
                        <div class="featured-course-item w-col w-col-3 w-dyn-item">
                            <div class="course-block-wrapper home-featured">
                                <a class="course-image-link-block home-featured w-inline-block" href="{{route('pages.department.show', $d->slug)}}" style="background-image: url('/files/storage/app/{{$d->image}}');"></a>
                                <div class="course-content-block">
                                    <a class="course-title-link" href="{{route('pages.department.show', $d->slug)}}">{{$d->name}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
