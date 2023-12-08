@extends('layout')

@section('title')
    Последние новости ФИИТ
@endsection

@section('content')

    <div class="featured-courses page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">Новости</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">ФИИТ</h2>
            </div>
        </div>
    </div>

    <div class="section tint">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">Последние новости ФИИТ</h2>
                <div class="section-title-divider"></div>
            </div>
            <div class="featured-courses-list-wrapper w-dyn-list">
                <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                    @foreach($fiitBlogs as $b)
                        <div class="featured-course-item w-col w-col-6 w-dyn-item">
                            <div class="course-block-wrapper">
                                <a class="course-image-link-block large w-inline-block" href="{{route('pages.blog.fiit.show', $b->slug)}}" style="background-image: url('/files/storage/app/{{$b->image}}');">
                                </a>
                                <div class="course-content-block">
                                    <a class="course-title-link with-summary" href="{{route('pages.blog.fiit.show', $b->slug)}}">
                                        {{$b->name}}
                                    </a>
                                    {!! htmlspecialchars_decode(str_limit($b->body, 150)) !!}
                                </div>
                                <div class="_2 course-content-block">
                                    <div class="course-info-icon"></div>
                                    <div class="course-info-title">{{$b->created_at->format('d.m.Y')}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
