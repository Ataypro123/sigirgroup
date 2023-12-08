@extends('layout')

@section('title')
    {{$photoCategory->name}}
@endsection

@section('content')

    <div class="featured-courses page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">{{$photoCategory->name}}</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">ФИИТ</h2>
            </div>
        </div>
    </div>

    <div class="section tint">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">{{$photoCategory->name}}</h2>
                <div class="section-title-divider"></div>
            </div>
            <div class="featured-courses-list-wrapper w-dyn-list">
                <div class="featured-courses-list w-clearfix w-dyn-items w-row">

                    @foreach($photoCategory->photoSubcategory as $ps)

                    <div class="featured-course-item w-col w-col-12 w-dyn-item photo-block-single">
                        <div class="course-block-wrapper">
                            <div class="course-content-block">
                                <a class="course-title-link with-summary">{{$ps->name}}</a>
                                <br>
                                <div class="featured-course-item w-col w-col-5 w-dyn-item photo-s-block">
                                    <div class="fotorama" data-nav="thumbs" data-allowfullscreen="true">
                                        @foreach($ps->photo as $img)
                                            <img src='{{asset("files/storage/app/{$img->uploads}")}}' class="img-fluid">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="featured-course-item w-col w-col-7 w-dyn-item photo-s-block">
                                    {!! htmlspecialchars_decode($ps->body) !!}
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
