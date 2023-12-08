@extends('layout')

@section('title')
    Кафедры
@endsection

@section('content')

    <div class="course page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">Кафедры</h1>
                <h2 class="category page-subtitle" data-ix="fade-in-on-load-2">ФИИТ</h2>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">Все кафедры</h2>
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
