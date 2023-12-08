@extends('layout')

@section('title')
    {{$chart->name}}: {{$chartMaterial->name}}
@endsection

@section('content')

    <div class="course page-header">
        <div class="page-header-overlay">
            <div class="container w-container">
                <h1 class="page-header-title" data-ix="fade-in-on-load">{{$chart->name}}: {{$chartMaterial->name}}</h1>
                <h2 class="category page-subtitle" data-ix="fade-in-on-load-2">ФИИТ</h2>
            </div>
        </div>
    </div>

    <div class="section tint">
        <div class="container w-container">
            <div class="section-title-wrapper">
                <h2 class="section-title">{{$chart->name}}: {{$chartMaterial->name}}</h2>
                <div class="section-title-divider"></div>
            </div>
            <div class="featured-courses-list-wrapper w-dyn-list">
                <div class="featured-courses-list w-clearfix w-dyn-items w-row">
                    
                    @foreach($chartMaterial->chartMaterial as $ch)
                    <div class="featured-course-item w-col w-col-6 w-dyn-item">
                        <div class="course-block-wrapper">
                            <a class="large w-block" target="_blanck" href='{{url("files/storage/app/{$ch->pdf}")}}'>
                                <iframe src='{{url("files/storage/app/{$ch->pdf}")}}' width="100%"></iframe>
                            </a>
                            <div class="course-content-block">
                                <a class="course-title-link with-summary" href='{{url("files/storage/app/{$ch->pdf}")}}' target="_blanck">
                                    Группа: {{$ch->name}}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
