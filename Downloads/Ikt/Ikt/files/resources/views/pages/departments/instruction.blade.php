@extends('layout')

@section('title')
    Инструкции
@endsection

@section('content')

    <div class="featured-courses page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">Инструкции</h1>
                <h2 class="page-subtitle" data-ix="fade-in-on-load-2">ФИИТ</h2>
            </div>
        </div>
    </div>

    <div class="section tint">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">Все инструкции</h2>
                <div class="section-title-divider"></div>
            </div>
            <div class="featured-courses-list-wrapper w-dyn-list">
                <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                    @foreach($instructions as $i)
                        <div class="featured-course-item w-col w-col-6 w-dyn-item">
                            <div class="course-block-wrapper">
                                <a class="course-image-link-block large w-inline-block is-video-block">
                                    @if($i->video)
                                        <iframe width="100%" height="100%" src='{{asset("files/storage/app/{$i->video}")}}'></iframe>
                                    @endif
                                    @if($i->url)
                                        <iframe width="100%" height="100%" src="{{$i->url}}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @endif
                                </a>
                                <div class="course-content-block">
                                    @if($i->video)
                                        <a class="course-title-link with-summary" href='{{url("files/storage/app/{$i->video}")}}' target="_blanck">{{$i->name}}</a>
                                    @endif
                                    @if($i->url)
                                        <a class="course-title-link with-summary" href="{{$i->url}}" target="_blanck">{{$i->name}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
