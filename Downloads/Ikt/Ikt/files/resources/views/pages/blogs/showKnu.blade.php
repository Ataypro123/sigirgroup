@extends('layout')

@section('title')
    {{$blog->name}}
@endsection

@section('content')

    <div class="blog-post">
        <div class="blog-post page-header-overlay">
            <div class="container w-container">
                <div class="blog-title-wrapper">
                    <h1 class="blog-post-title page-header-title" data-ix="fade-in-on-load">
                        {{$blog->name}}
                    </h1>
                    <div class="blog-post-header-info-block">
                        <div class="course-category-title icon" data-ix="fade-in-on-load-2"></div>
                        <div class="blog-post-date-title" data-ix="fade-in-on-load-2">{{$blog->created_at->format('d.m.Y')}}</div>
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
                        <h4 class="title-single-blog">{{$blog->name}}</h4>
                        <div>
                            <div class="fotorama" data-nav="thumbs" data-allowfullscreen="true">
                                <img src='{{asset("files/storage/app/{$blog->image}")}}' class="img-single-blog">
                                @foreach($blog->knuUpload as $img)
                                    <img src='{{asset("files/storage/app/{$img->uploads}")}}' class="img-fluid">
                                @endforeach
                            </div>
                        </div>
                        <br>
                        <br>
                        {!! htmlspecialchars_decode($blog->body) !!}
                        <br>
                        <a class="link-below-paragraph" href="{{$blog->url}}" target="_blank">Взято с КНУ →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
