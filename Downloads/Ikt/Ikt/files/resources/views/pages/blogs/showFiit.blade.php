@extends('layout')

@section('title')
    {{$fiitBlog->name}}
@endsection

@section('content')

    <div class="blog-post">
        <div class="blog-post page-header-overlay">
            <div class="container w-container">
                <div class="blog-title-wrapper">
                    <h1 class="blog-post-title page-header-title" data-ix="fade-in-on-load">
                        {{$fiitBlog->name}}
                    </h1>
                    <div class="blog-post-header-info-block">
                        <div class="course-category-title icon" data-ix="fade-in-on-load-2"></div>
                        <div class="blog-post-date-title" data-ix="fade-in-on-load-2">{{$fiitBlog->created_at->format('d.m.Y')}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section tint">
        <div class="container w-container">
            <div class="blog-post-wrapper">
                <div class="blog-post-content-wrapper first">
                    <div class="blog-post-content w-richtext">
                        <h4 class="title-single-blog">{{$fiitBlog->name}}</h4>
                        <div>
                            <div class="fotorama" data-nav="thumbs" data-allowfullscreen="true">
                                <img src='{{asset("files/storage/app/{$fiitBlog->image}")}}' class="img-single-blog">
                                @foreach($fiitBlog->fiitUpload as $img)
                                    <img src='{{asset("files/storage/app/{$img->uploads}")}}' class="img-fluid">
                                @endforeach
                            </div>
                        </div>
                        <br>
                        <br>
                        {!! htmlspecialchars_decode($fiitBlog->body) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
